<?php

namespace App\Moldova\Service;


use App\Moldova\Repositories\Tenders\TendersRepositoryInterface;

class Tenders
{
    protected $tender;

    public function __construct(TendersRepositoryInterface $tender)
    {
        $this->tender = $tender;
    }

    /**
     * @return array
     */
    public function getTendersByOpenYear()
    {
        return $this->filterByYear($this->tender->getTendersByOpenYear());

    }

    /**
     * @param $tenders
     *
     * @return array
     */
    protected function filterByYear($tenders)
    {
        $tenderByOpenYear = [];

        foreach ($tenders as $tender) {
            $year                    = $tender['_id']['year'];
            $tenderByOpenYear[$year] = $tender['count'];
        }

        ksort($tenderByOpenYear);

        return $tenderByOpenYear;
    }

    /**
     * @param $procuringAgency
     *
     * @return array
     */
    public function getProcuringAgencyTenderByOpenYear($procuringAgency)
    {
        return $this->filterByYear($this->tender->getProcuringAgencyTenderByOpenYear($procuringAgency));
    }

    /**
     * @param $params
     *
     * @return mixed
     */
    public function getAllTenders($params)
    {
        return [
            'draw'            => (int) $params['draw'],
            'recordsTotal'    => $this->getTendersCount(""),
            "recordsFiltered" => $this->getTendersCount($params),
            "data"            => $this->tender->getAllTenders($params)
        ];
    }

    /**
     * @param $params
     *
     * @return mixed
     */
    public function getTendersCount($params){
        return $this->tender->getTendersCount($params);
    }

    public function getTenderDetailByID($tenderID)
    {
        return $this->tender->getTenderDetailByID($tenderID);
    }

    public function getTenderFeedback($tenderRef)
    {
        $splitTenderRef = explode(" ", $tenderRef);
        $ref            = $splitTenderRef[2];

        $feedback = $this->tender->getTenderFeedback($ref);
        if ($feedback) {
            return $feedback->toArray();
        }

        return [];
    }

}
