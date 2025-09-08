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
        require_once(ROOT  . '/app/Config/database.php');
        $DB = new DATABASE_CONFIG();

        $dbc = new mysqli($DB->default['host'], $DB->default['login'], $DB->default['password'], $DB->default['database']);

        // Make sure we use UTF8 encoding
        if ($DB->default['encoding'] == 'utf8') {
            $dbc->set_charset($DB->default['encoding']);
        }

        // At this point you can just run raw queries like:
        $data = $dbc->query('SELECT * FROM utm_data')->fetch_all(MYSQLI_ASSOC);

        // Close the database connection
        $dbc->close();

        $this->set(['data' => $data]);
    }
}
