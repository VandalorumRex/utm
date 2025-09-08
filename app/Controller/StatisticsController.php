<?php

/**
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/CakePHP3 Framework/Controller.php to edit this template
 */
App::uses('AppController', 'Controller');

/**
 * CakePHP StatisticsController
 *
 * @author Mansur
 */
class StatisticsController extends AppController
{
    //var $name="NoModels";
    //public $uses = null;

    public function utm($list)
    {
        if ($list !== 'list') {
            throw new NotFoundException();
        }
        require_once(ROOT . '/app/Config/database.php');
        $DB = new DATABASE_CONFIG();

        $dbc = new mysqli($DB->default['host'], $DB->default['login'], $DB->default['password'], $DB->default['database']);

        // Make sure we use UTF8 encoding
        if ($DB->default['encoding'] == 'utf8') {
            $dbc->set_charset($DB->default['encoding']);
        }

        /** @var array<array<string, string|null>> $utmData */
        $utmData = $dbc->query('SELECT id, source, medium, campaign, content, term
            FROM utm_data
            ORDER BY source, medium, campaign, content, term')
            ->fetch_all(MYSQLI_ASSOC);

        // Close the database connection
        $dbc->close();
        /** @var array<string, array<string, <array<string, array<string, array<string, string|null>>>>> $data */
        $data = [];
        foreach ($utmData as $item) {
            if (!isset($data[$item['source']])) {
                $data[$item['source']] = [];
            }
            if (!isset($data[$item['source']][$item['medium']])) {
                $data[$item['source']][$item['medium']] = [];
            }
            if (!isset($data[$item['source']][$item['medium']][$item['campaign']])) {
                $data[$item['source']][$item['medium']][$item['campaign']] = [];
            }
            if (!isset($data[$item['source']][$item['medium']][$item['campaign']][$item['content']])) {
                $data[$item['source']][$item['medium']][$item['campaign']][$item['content']] = [];
            }
            array_push($data[$item['source']][$item['medium']][$item['campaign']][$item['content']], $item['term']);
        }
        $this->set(['data' => $data]);
    }
}
