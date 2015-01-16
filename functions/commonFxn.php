<?php

if (!defined('BASE_PATH'))
    exit('No direct script access allowed');
ini_set("display_errors", 1);
include_once(CLASSES_URL . 'commonClass.php');

class commonFxn extends commonClass {

    protected $userTable = 'tbl_user';
    protected $userGrpTable = 'tbl_usergroup';
    protected $userRoleTable = 'tbl_userrole';
    protected $plrs_complaint = 'plrs_complaint';
    protected $plrs_complaint_type = 'plrs_complaint_type';
    protected $plrs_user_comment = 'plrs_user_comment';
    // For Previous CRM
    protected $usergrp_billperTable = 'tbl_usergroup_bill_permission';
    protected $clearanceStatusTable = 'tbl_clearance_status';
    protected $clearanceBillsTable = 'tbl_clearance_bills';
    protected $clearanceCommentTable = 'tbl_clearance_comment';
    protected $clearanceUploadTable = 'tbl_clearance_upload';
    protected $clearanceQuesTable = 'tbl_clearance_ques';
    protected $clearancePaymentTable = 'tbl_clearance_payment';
    protected $clearanceBankTable = 'tbl_clearance_bank';
    protected $clearancePaymentModeTable = 'tbl_clearance_payment_mode';

    public function __construct() {
        parent::__construct();
    }

    public function isSuperAdmin($uid) {
        if ($uid != '') {
            $resultSet = mysql_query("select id from `$this->userTable` where `id` = '$uid' and `user_group` = '1'") or die(mysql_error());
            if (mysql_num_rows($resultSet) > 0) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function isAdmin($uid) {
        if ($uid != '') {
            $resultSet = mysql_query("select id from `$this->userTable` where `id` = '$uid' and `user_group` = '2'") or die(mysql_error());
            if (mysql_num_rows($resultSet) > 0) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function isCounsellor($uid) {
        if ($uid != '') {
            $resultSet = mysql_query("select id from `$this->userTable` where `id` = '$uid' and `user_group` = '3'") or die(mysql_error());
            if (mysql_num_rows($resultSet) > 0) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function isStateCoordinator($uid) {
        if ($uid != '') {
            $resultSet = mysql_query("select id from `$this->userTable` where `id` = '$uid' and `user_group` = '4'") or die(mysql_error());
            if (mysql_num_rows($resultSet) > 0) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function isCaseCoordinator($uid) {
        if ($uid != '') {
            $resultSet = mysql_query("select id from `$this->userTable` where `id` = '$uid' and `user_group` = '5'") or die(mysql_error());
            if (mysql_num_rows($resultSet) > 0) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function isSDM($uid) {
        if ($uid != '') {
            $resultSet = mysql_query("select id from `$this->userTable` where `id` = '$uid' and `user_group` = '6'") or die(mysql_error());
            if (mysql_num_rows($resultSet) > 0) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function isCallCentreStaff($uid) {
        if ($uid != '') {
            $resultSet = mysql_query("select id from `$this->userTable` where `id` = '$uid' and `user_group` = '7'") or die(mysql_error());
            if (mysql_num_rows($resultSet) > 0) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function is_array_empty($array, $check_all_elements = false) {
        if (!is_array($array) || empty($array))
            return true;

        $elements = count($array);
        foreach ($array as $element) {
            if (empty($element) || (is_array($element) && is_array_empty($element, $check_all_elements))) {
                if ($check_all_elements)
                    return true;
                else
                    $elements--;
            }
        }
        return empty($elements);
    }

    public function search_in_array($array, $search_key) {
        if (is_array($array) && count($array) > 0) {
            $foundvalue = array_key_exists($search_key, $array);
            if ($foundvalue === FALSE) {
                foreach ($array as $key => $value) {
                    if ($search_key === $key) {
                        return $array[$search_key];
                    }
                    else if (is_array($value) && count($value) > 0) {
                        $foundvalue = $this->search_in_array($value, $search_key);
                        if ($foundvalue != FALSE)
                            return $foundvalue;
                    }
                }
            }
            else
                return $array[$search_key];
        }
    }

}