<?php

namespace App\Offers;

class FilterGroup {

    private array $filters = [];

    public function __construct()
    {
        $this->init();
    }

    public function init(): void
    {
        //offerId
        $id = $_POST['ff-offer-id'] ?? 0;
        if (!empty($id) && is_numeric($id)) {
            $this->addFilter('offer_id = ?', [$id]);
        }

        //customer
        $customer = $_POST['ff-customer'] ?? null;
        if (!empty($customer) && is_numeric($customer)) {
            $this->addFilter('customer_id = ?', [$customer]);
        }

        //from
        $from = $_POST['ff-from'] ?? null;
        if (!empty($from)) {
            $date = date_create($from);
            $date = date_format($date,"Y-m-d");
            $this->addFilter('created_at >= ?', [$date]);
        }

        //from
        $to = $_POST['ff-to'] ?? null;
        if (!empty($to)) {
            $date = date_create($to);
            $date = date_format($date,"Y-m-d");
            $this->addFilter('created_at <= ?', [$date]);
        }
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    private function addFilter(string $where, array $params): void
    {
        $filter = new Filter();
        $filter->setWhere($where);
        $filter->setParams($params);
        $this->filters[] = $filter;
    }
}
