<?php
/**
 * enlogic-pdu.inc.php
 *
 * LibreNMS sensors current discovery module for enLOGIC PDU
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * @link       https://www.librenms.org
 *
 * @copyright  2017 Neil Lathwood
 * @author     Neil Lathwood <gh+n@laf.io>
 */
foreach ($pre_cache['enlogic_pdu_input'] as $index => $data) {
    if (is_array($data)) {
        $oid = '.1.3.6.1.4.1.38446.1.3.4.1.5.' . $index;
        $tmp_index = 'pduInputPhaseStatusCurrent.' . $index;
        $descr = "Input Phase $index";
        $divisor = 1;
        $type = 'enlogic-pdu';
        $low_limit = $data['pduInputPhaseConfigCurrentLowerCriticalThreshold'];
        $low_warn = $data['pduInputPhaseConfigCurrentLowerWarningThreshold'];
        $high_limit = $data['pduInputPhaseConfigCurrentUpperCriticalThreshold'];
        $high_warn = $data['pduInputPhaseConfigCurrentUpperWarningThreshold'];
        $current = $data['pduInputPhaseStatusCurrent'];
        if ($current > 0) {
            discover_sensor(null, 'current', $device, $oid, $tmp_index, $type, $descr, $divisor, '1', $low_limit, $low_warn, $high_warn, $high_limit, $current);
        }
    }
}

foreach ($pre_cache['enlogic_pdu_circuit'] as $index => $data) {
    if (is_array($data)) {
        $oid = '.1.3.6.1.4.1.38446.1.4.4.1.5.' . $index;
        $tmp_index = 'pduCircuitBreakerStatusCurrent.' . $index;
        $descr = "Input Phase {$data['pduCircuitBreakerLabel']}";
        $divisor = 1;
        $type = 'enlogic-pdu';
        $low_limit = $data['pduCircuitBreakerConfigLowerCriticalThreshold'];
        $low_warn = $data['pduCircuitBreakerConfigLowerWarningThreshold'];
        $high_limit = $data['pduCircuitBreakerConfigUpperCriticalThreshold'];
        $high_warn = $data['pduCircuitBreakerConfigUpperWarningThreshold'];
        $current = $data['pduCircuitBreakerStatusCurrent'];
        if ($current > 0) {
            discover_sensor(null, 'current', $device, $oid, $tmp_index, $type, $descr, $divisor, '1', $low_limit, $low_warn, $high_warn, $high_limit, $current);
        }
    }
}
