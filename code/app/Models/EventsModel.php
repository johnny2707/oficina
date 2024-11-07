<?php namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use Config\Services;
use PhpParser\Node\Expr\FuncCall;

class EventsModel extends Model
{
    protected $db;

    protected $table = 'tb_events';
    protected $useSoftDeletes = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getAllEvents()
    {
        $query = $this->db->table('tb_events')->select('*')
                                              ->join('tb_events_types', 'tb_events.type = tb_events_types.id')
                                              ->join('tb_clients_vehicles', 'tb_events.car_id = tb_clients_vehicles.id');

        return $query->get();
    }   

    public function getAllTypes()
    {
        $query = $this->db->table('tb_events_types')->select('*');

        return $query->get()->getResultArray();
    }

    public function getAllInterventionsByDateRange($start, $end)
    {
        $query = $this->db->table('tb_events')->select('*')
                                              ->where('event_date >= '.$start)
                                              ->where('event_date <= '.$end);
        
        return $query->get();
    }
}