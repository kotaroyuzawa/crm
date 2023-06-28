<?php

namespace App\Inc;

class Navigator {

    public const NAV_CUSTOMERS = 'customer';
    public const NAV_OFFERS = 'offers';
    public const NAV_COMPANY = 'company';
    public const NAV_LOGOUT = 'logout';

    private array $items;

    public function __construct()
    {
        $this->init();
    }

    private function init(): void
    {
        $this->items = [
            'customer' => [
                'title' => 'Kunden',
                'link' => '/customers'
            ],
            'offers' => [
                'title' => 'Angebote',
                'link' => ''
            ],
            'company' => [
                'title' => 'Firma',
                'link' => '',
            ],
            'logout' => [
                'title' => 'Logout',
                'link' => ''
            ]
        ];
    }

    public function setItemActive(string $item): void
    {
        if (!empty($this->items[$item])) {
            $this->items[$item]['active'] = true;
        }
    }

    private function renderItem(array $item): string
    {
        $active = '';
        if (!empty($item['active'])) {
            $active = 'active';
        }

        return '<a 
        href="' . $item['link'] . '" 
        class="list-group-item list-group-item-action ' . $active. '">' .
            $item['title'] .
        '</a>';
    }

    public function render(): string
    {
        $elements = '';
        foreach ($this->items as $item){
            $elements .= $this->renderItem($item);
        }

        return '<div class="list-group">' . $elements . '</div>';
    }
}
