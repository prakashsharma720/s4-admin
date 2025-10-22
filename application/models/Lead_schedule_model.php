<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_schedule_model extends CI_Model {

    public function insertActivities($lead_id, $activities) {
        foreach ($activities as $activity) {
            $data = [
                'lead_id' => $lead_id,
                'activity_type' => $activity['activity_type'],
                'due_date' => $activity['due_date'],
                'assign_to' => $activity['assign_to'],
                'activity_summary' => $activity['activity_summary'],
                'document_file' => isset($activity['document_file']) ? $activity['document_file'] : null,
                'other_text' => isset($activity['other_text']) ? $activity['other_text'] : null,
            ];
            $this->db->insert('lead_schedule_activities', $data);
        }
    }

    public function getActivitiesByLead($lead_id) {
        return $this->db->where('lead_id', $lead_id)
                        ->order_by('id', 'DESC')
                        ->get('lead_schedule_activities')
                        ->result_array();
    }
}