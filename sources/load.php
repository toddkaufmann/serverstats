<?php
/**
 * $Id$
 *
 * Author: David Danier, david.danier@team23.de
 * Project: Serverstats, http://www.webmasterpro.de/~ddanier/serverstats/
 * License: GPL v2 or later (http://www.gnu.org/copyleft/gpl.html)
 *
 * Copyright (C) 2005 David Danier
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

class load extends source
{
	private $loadavgfile;
	
	private $min1;
	private $min5;
	private $min15;
	private $running;
	private $tasks;
	
	public function __construct($loadavgfile = '/proc/loadavg')
	{
		$this->loadavgfile = $loadavgfile;
	}
	
	public function refreshData()
	{
		$temp = file_get_contents($this->loadavgfile);
		$temp = explode(' ', $temp);
		$this->min1 = $temp[0];
		$this->min5 = $temp[1];
		$this->min15 = $temp[2];
		$temp = explode('/', $temp[3]);
		$this->running = $temp[0];
		$this->tasks = $temp[1];
	}

	public function initRRD(rrd $rrd)
	{
		$rrd->addDatasource('1min', 'GAUGE', null, 0);
		$rrd->addDatasource('5min', 'GAUGE', null, 0);
		$rrd->addDatasource('15min', 'GAUGE', null, 0);
		$rrd->addDatasource('running', 'GAUGE', null, 0);
		$rrd->addDatasource('tasks', 'GAUGE', null, 0);
	}

	public function updateRRD(rrd $rrd)
	{
		$rrd->setValue('1min', $this->min1);
		$rrd->setValue('5min', $this->min5);
		$rrd->setValue('15min', $this->min15);
		$rrd->setValue('running', $this->running);
		$rrd->setValue('tasks', $this->tasks);
	}
}

?>
