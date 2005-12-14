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

$config = array();
// Define the look of the graphs
$config['width'] = 500;
$config['height'] = 150;
$config['usecache'] = true;
// List of all Graphs
$config['list'] = array(
    array(
        'title' => 'Users logged in',
        'lowerLimit' => 0,
        'altAutoscaleMax' => true,
        'content' => array(
            array(
                'type' => 'AREA',
                'source' => 'users',
                'ds' => 'users',
                'cf' => 'AVERAGE',
                'legend' => 'users logged in',
                'color' => '4444DD'
            )
        )
    ),
    array(
        'title' => 'Load',
        'lowerLimit' => 0,
        'altAutoscaleMax' => true,
        'content' => array(
            array(
                'type' => 'COMMENT',
                'text' => 'average number of tasks in the queue\:\n'
            ),
            array(
                'type' => 'LINE',
                'source' => 'load',
                'ds' => '1min',
                'cf' => 'AVERAGE',
                'legend' => '1 minute',
                'width' => 1,
                'color' => 'FFDD00'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_1min',
                'cf' => 'LAST',
                'format' => '  cur\: %01.2lf'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_1min',
                'cf' => 'MAXIMUM',
                'format' => 'max\: %01.2lf'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_1min',
                'cf' => 'MINIMUM',
                'format' => 'min\: %01.2lf'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_1min',
                'cf' => 'AVERAGE',
                'format' => 'avg\: %01.2lf\n'
            ),
            array(
                'type' => 'LINE',
                'source' => 'load',
                'ds' => '5min',
                'cf' => 'AVERAGE',
                'legend' => '5 minutes',
                'width' => 1,
                'color' => 'FF8800'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_5min',
                'cf' => 'LAST',
                'format' => ' cur\: %01.2lf'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_5min',
                'cf' => 'MAXIMUM',
                'format' => 'max\: %01.2lf'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_5min',
                'cf' => 'MINIMUM',
                'format' => 'min\: %01.2lf'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_5min',
                'cf' => 'AVERAGE',
                'format' => 'avg\: %01.2lf\n'
            ),
            array(
                'type' => 'LINE',
                'source' => 'load',
                'ds' => '15min',
                'cf' => 'AVERAGE',
                'legend' => '15 minutes',
                'width' => 1,
                'color' => 'FF0000'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_15min',
                'cf' => 'LAST',
                'format' => 'cur\: %01.2lf'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_15min',
                'cf' => 'MAXIMUM',
                'format' => 'max\: %01.2lf'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_15min',
                'cf' => 'MINIMUM',
                'format' => 'min\: %01.2lf'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'load_15min',
                'cf' => 'AVERAGE',
                'format' => 'avg\: %01.2lf\n'
            )
        )
    ),
    array(
        'title' => 'Memory',
        'lowerLimit' => 0,
        'altAutoscaleMax' => true,
        'content' => array(
            array(
                'type' => 'DEF',
                'source' => 'mem',
                'ds' => 'MemTotal',
                'cf' => 'AVERAGE',
                'name' => 'total'
            ),
            array(
                'type' => 'CDEF',
                'expression' => 'total,1024,/,1024,/',
                'name' => 'total_mb'
            ),
            array(
                'type' => 'DEF',
                'source' => 'mem',
                'ds' => 'MemFree',
                'cf' => 'AVERAGE',
                'name' => 'free'
            ),
            array(
                'type' => 'CDEF',
                'expression' => 'free,1024,/,1024,/',
                'name' => 'free_mb'
            ),
            array(
                'type' => 'DEF',
                'source' => 'mem',
                'ds' => 'Cached',
                'cf' => 'AVERAGE',
                'name' => 'cached'
            ),
            array(
                'type' => 'CDEF',
                'expression' => 'cached,1024,/,1024,/',
                'name' => 'cached_mb'
            ),
            array(
                'type' => 'AREA',
                'name' => 'total',
                'legend' => 'total',
                'color' => 'FFFFCC'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'total_mb',
                'cf' => 'LAST',
                'format' => ' cur\: %01.2lf MB\n'
            ),
            array(
                'type' => 'AREA',
                'name' => 'free',
                'legend' => 'free',
                'color' => 'FF0000'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'free_mb',
                'cf' => 'LAST',
                'format' => '   cur\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'free_mb',
                'cf' => 'MINIMUM',
                'format' => 'min\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'free_mb',
                'cf' => 'MAXIMUM',
                'format' => 'max\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'free_mb',
                'cf' => 'AVERAGE',
                'format' => 'avg\: %01.2lf MB\n'
            ),
            array(
                'type' => 'STACK',
                'name' => 'cached',
                'legend' => 'cached',
                'color' => 'EEDD22'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'cached_mb',
                'cf' => 'LAST',
                'format' => 'cur\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'cached_mb',
                'cf' => 'MINIMUM',
                'format' => 'min\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'cached_mb',
                'cf' => 'MAXIMUM',
                'format' => 'max\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'cached_mb',
                'cf' => 'AVERAGE',
                'format' => 'avg\: %01.2lf MB'
            ),
            array(
                'type' => 'LINE',
                'width' => 1,
                'name' => 'total',
                'color' => '000000'
            )
        )
    ),
    array(
        'title' => 'Swap',
        'lowerLimit' => 0,
        'altAutoscaleMax' => true,
        'content' => array(
            array(
                'type' => 'DEF',
                'source' => 'mem',
                'ds' => 'SwapTotal',
                'cf' => 'AVERAGE',
                'name' => 'total'
            ),
            array(
                'type' => 'CDEF',
                'expression' => 'total,1024,/,1024,/',
                'name' => 'total_mb'
            ),
            array(
                'type' => 'DEF',
                'source' => 'mem',
                'ds' => 'SwapFree',
                'cf' => 'AVERAGE',
                'name' => 'free'
            ),
            array(
                'type' => 'CDEF',
                'expression' => 'free,1024,/,1024,/',
                'name' => 'free_mb'
            ),
            array(
                'type' => 'DEF',
                'source' => 'mem',
                'ds' => 'SwapCached',
                'cf' => 'AVERAGE',
                'name' => 'cached'
            ),
            array(
                'type' => 'CDEF',
                'expression' => 'cached,1024,/,1024,/',
                'name' => 'cached_mb'
            ),
            array(
                'type' => 'AREA',
                'name' => 'total',
                'legend' => 'total',
                'color' => 'FFFFCC'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'total_mb',
                'cf' => 'LAST',
                'format' => ' cur\: %01.2lf MB\n'
            ),
            array(
                'type' => 'AREA',
                'name' => 'free',
                'legend' => 'free',
                'color' => 'FF0000'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'free_mb',
                'cf' => 'LAST',
                'format' => '   cur\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'free_mb',
                'cf' => 'MINIMUM',
                'format' => 'min\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'free_mb',
                'cf' => 'MAXIMUM',
                'format' => 'max\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'free_mb',
                'cf' => 'AVERAGE',
                'format' => 'avg\: %01.2lf MB\n'
            ),
            array(
                'type' => 'STACK',
                'name' => 'cached',
                'legend' => 'cached',
                'color' => 'EEDD22'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'cached_mb',
                'cf' => 'LAST',
                'format' => 'cur\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'cached_mb',
                'cf' => 'MINIMUM',
                'format' => 'min\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'cached_mb',
                'cf' => 'MAXIMUM',
                'format' => 'max\: %01.2lf MB'
            ),
            array(
                'type' => 'GPRINT',
                'name' => 'cached_mb',
                'cf' => 'AVERAGE',
                'format' => 'avg\: %01.2lf MB'
            ),
            array(
                'type' => 'LINE',
                'width' => 1,
                'name' => 'total',
                'color' => '000000'
            )
        )
    ),
    array(
        'title' => 'CPU usage',
        'upperLimit' => 100,
        'lowerLimit' => 0,
        'altAutoscaleMax' => true,
        'content' => array(
            array(
                'type' => 'AREA',
                'source' => 'cpu',
                'ds' => 'cpu_system',
                'cf' => 'AVERAGE',
                'legend' => 'System',
                'color' => 'FF0000'
            ),
            array(
                'type' => 'AREA',
                'source' => 'cpu',
                'ds' => 'cpu_user',
                'cf' => 'AVERAGE',
                'legend' => 'User',
                'color' => '00FF00',
                                'stacked' => true
            ),
            array(
                'type' => 'AREA',
                'source' => 'cpu',
                'ds' => 'cpu_nice',
                'cf' => 'AVERAGE',
                'legend' => 'Nice',
                'color' => '0000FF',
                                'stacked' => true
            ),
            array(
                'type' => 'AREA',
                'source' => 'cpu',
                'ds' => 'cpu_idle',
                'cf' => 'AVERAGE',
                'legend' => 'Idle',
                'color' => 'FFFF00',
                                'stacked' => true
            )
        )
    ),
    array(
        'title' => 'Processes',
        'lowerLimit' => 0,
        'altAutoscaleMax' => true,
        'content' => array(
            array(
                'type' => 'AREA',
                'source' => 'load',
                'ds' => 'tasks',
                'cf' => 'AVERAGE',
                'legend' => 'number of processes',
                'color' => 'FFDD00'
            ),
            array(
                'type' => 'AREA',
                'source' => 'load',
                'ds' => 'running',
                'cf' => 'AVERAGE',
                'legend' => 'running processes',
                'color' => 'FF0000'
            )
        )
    ),
    array(
        'title' => 'Traffic (eth0)',
        'lowerLimit' => 0,
        'altAutoscaleMax' => true,
        'content' => array(
            array(
                'type' => 'LINE',
                'source' => 'traffic_proc',
                'ds' => 'eth0_rbytes',
                'cf' => 'AVERAGE',
                'legend' => 'Download Bytes/s',
                'width' => 1,
                'color' => '0002A3'
            ),
            array(
                'type' => 'LINE',
                'source' => 'traffic_proc',
                'ds' => 'eth0_tbytes',
                'cf' => 'AVERAGE',
                'legend' => 'Upload Bytes/s',
                'width' => 1,
                'color' => '00A302'
            )
        )
    ) 
);
// Define what Graphes we want in the detail view (detail.php)
$config['types'] = array(
//	array('title' => 'Hour', 'period' => 3600), // only useful if you have a small step
	array('title' => 'Day', 'period' => 86400),
	array('title' => 'Week', 'period' => 604800),
	array('title' => 'Month', 'period' => 2678400),
	array('title' => 'Year', 'period' => 31536000)
);
// The period uses in the graph overview (index.php)
$config['defaultperiod'] = 86400;

?>
