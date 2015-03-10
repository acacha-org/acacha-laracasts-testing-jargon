<?php
/**
 * Created by Sergi Tur Badenas @2015
 * http://acacha.org/sergitur
 * http://acacha.org
 * Date: 10/03/15
 * Time: 12:10
 */

namespace Acacha\Laracasts\TestingJargon;


interface UserRepository {

    public function create(array $user);
}