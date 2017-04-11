<?php

namespace Surveys\Model\Entity;

use Cake\ORM\Entity;

class Survey extends Entity
{

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

}
