<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Lib\Util;

/**
 * Description of CampaignType
 *
 * @author LENOVO
 */
abstract class CampaignType {
    const MEDICAL = "medical";
    const CHILD_WELFARE = "child-welfare";
    const CANCER = "cancer";
    
    const DONATED = "donated";
    const VIEWED = "viewed";
    const LIKED = "liked";
    
    const PENDING = "pending";
    const BLOCKED = "blocked";
    const CANCELLED = "cancelled";
    const COMPLETED = "completed";
}
