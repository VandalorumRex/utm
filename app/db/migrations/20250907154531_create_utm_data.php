<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

class CreateUtmData extends AbstractMigration
{
    public static $sources = ['bing', 'ecosia', 'google', 'quant', 'yandex'];
    public static $medims = ['cpc'];
    public static $campaigns = ['spring', 'summer', 'autumn', 'winter'];
    public static $contents = ['banner', 'delta'];
    public static $terms = ['audio', 'document', 'image', 'video', null];
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $table = $this->table('utm_data');
        $table
            ->addColumn('source', 'string', ['null' => false])
            ->addColumn('medium', 'string', ['null' => false])
            ->addColumn('campaign', 'string', ['null' => false])
            ->addColumn('content', 'string', ['null' => true])
            ->addColumn('term', 'string', ['null' => true])
            ->create();
        /** @var array<array<string, string>> $data */
        $data = [];
        if ($this->isMigratingUp()) {
            /** @var array<string, string> $item */
            $item = [];
            foreach (self::$sources as $source) {
                $item['source'] = $source;
                foreach (self::$medims as $medium) {
                    $item['medium'] = $medium;
                    foreach (self::$campaigns as $campaign) {
                        $item['campaign'] = $campaign;
                        foreach (self::$contents as $content) {
                            $item['content'] = $content;
                            foreach (self::$terms as $term) {
                                $item['term'] = $term;
                                array_push($data, $item);
                            }
                        }
                    }
                }
            }
            foreach ($data as $item) {
                $table->insert($item)->saveData();
            }
        }
    }

    public function down()
    {
        $this->table('utm_data')
            ->drop()->update();
    }
}
