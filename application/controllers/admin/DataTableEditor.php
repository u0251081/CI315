<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/5/18
 * Time: 下午 10:30
 */

    // DataTables PHP library
    include (APPPATH.'../userfile/adminset/vendor/datatables/Editor/php/DataTables.php');

    // Alias Editor classes so they are easy to use
    use
        DataTables\Editor,
        DataTables\Editor\Field,
        DataTables\Editor\Format,
        DataTables\Editor\Mjoin,
        DataTables\Editor\Options,
        DataTables\Editor\Upload,
        DataTables\Editor\Validate,
        DataTables\Editor\ValidateOptions;

    class DataTableEditor extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $help_array = array('url','form');
            $this->load->helper($help_array);
            $this->load->model('admin/faculty_model');
            $this->load->model('act_model');
            $this->load->library('session');
        }

        private function new_faculty_id($year = '00',$dpt = FALSE) {
            return $this->faculty_model->new_faculty_id($year,$dpt);
        }

        private function new_activity_id($date = '0000-00-00') {
            $date = implode('',explode('-', $date));
            return $this->act_model->get_acid($date);
        }

        public function faculty () {
            if ($this->session->userdata('account') === null) {

            } else {
                global $db;
                $editor = Editor::inst( $db, 'faculty' )
                    ->fields(
                        Field::inst( 'faculty.id', 'a.id')->set(Field::SET_CREATE),
                        Field::inst( 'faculty.college', 'a.college' )
                            ->options(
                                Options::inst()
                                    ->table('colleges')
                                    ->value('id')
                                    ->label('c_cname')
                            ),
                        Field::inst( 'b.c_cname'),
                        Field::inst( 'c.d_cabbr' ),
                        Field::inst( 'faculty.department', 'a.department')
                            ->options(
                                Options::inst()
                                    ->table('departments')
                                    ->value('id')
                                    ->label('d_cabbr')
                            ),
                        Field::inst( 'faculty.name', 'a.name' ),
                        Field::inst( 'faculty.PP', 'a.PP' ),
                        Field::inst( 'faculty.phone', 'a.phone' ),
                        Field::inst( 'faculty.extension', 'a.extension' ),
                        Field::inst( 'faculty.fax', 'a.fax' ),
                        Field::inst( 'faculty.email', 'a.email' ),
                        Field::inst( 'faculty.specialized', 'a.specialized' ),
                        Field::inst( 'faculty.classify', 'a.classify' )
                    )
                    ->leftJoin('colleges as b','faculty.college', '=', 'b.id')
                    ->leftJoin('departments as c', 'faculty.department', '=', 'c.id')
                    ->pkey('faculty.serial_number')
                    ->on('preCreate', function($editor, $value) {
                        $dept = $value['a']['department'];
                        $new_id = $this->new_faculty_id('00',$dept);
                        $editor
                            ->field('a.id')
                            ->setValue($new_id);
                    })
                    ->process( $_POST )
                    ->json();
            }
        }

        public function activity_v1() {
            global $db;
            $editor = Editor::inst($db, 'activity')
                ->fields(
                    Field::inst( 'activity.ac_id', 'ac_id'),
                    Field::inst( 'activity.title', 'ac_title'),
                    Field::inst( 'activity.ac_date', 'ac_date'),
                    Field::inst( 'activity.context', 'ac_cont')
                )
                ->pkey('activity.id')
                ->process( $_POST )
                ->json();
        }

        public function activity() {
            global $db;
            $editor = Editor::inst($db, 'activity')
                ->fields(
                    Field::inst( 'activity.ac_id', 'ac_id' ),
                    Field::inst( 'activity.title', 'ac_title' ),
                    Field::inst( 'activity.ac_date', 'ac_date' ),
                    Field::inst( 'activity.context', 'ac_cont' )
                )
                ->join(
                    Mjoin::inst( 'ac_img' )
                        ->link('activity.id', 'activity_to_img.ac_id')
                        ->link('ac_img.id', 'activity_to_img.ac_img')
                        ->fields(
                            Field::inst( 'id' )
                                ->upload(
                                    Upload::inst('./uploads/__NAME__')
                                        ->db( 'ac_img', 'id', array(
                                                'img' => Upload::DB_FILE_NAME
                                            )
                                        )
                                )
                        )
                )
                ->on('preCreate', function($editor, $value) {
                    $date = $value['activity']['ac_date'];
                    $new_id = $this->new_activity_id($date);
                })
                ->pkey('activity.id')
                ->process( $_POST )
                ->debug(true)
                ->json();
        }

        public function colleges () {
            global $db;
            $editor = Editor::inst($db, 'colleges')
                ->fields(
                    Field::inst( 'colleges.id', 'id' ),
                    Field::inst( 'colleges.c_abbr', 'eabbr' ),
                    Field::inst( 'colleges.c_ename', 'ename' ),
                    Field::inst( 'colleges.c_cname', 'cname' )
                )
                ->pkey('serial_number')
                ->process( $_POST )
                ->json();
        }
        public function departments () {
            global $db;
            $editor = Editor::inst($db, 'departments')
                ->fields(
                    Field::inst( 'departments.id', 'id' ),
                    Field::inst( 'departments.d_eabbr', 'eabbr' ),
                    Field::inst( 'departments.d_cabbr', 'cabbr' ),
                    Field::inst( 'departments.d_ename', 'ename' ),
                    Field::inst( 'departments.d_cname', 'cname' )
                )
                ->pkey('departments.serial_number')
                ->process( $_POST )
                ->json();
        }

    }
?>