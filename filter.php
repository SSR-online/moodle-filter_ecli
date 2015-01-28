<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Data activity filter version information
 *
 * @package    filter
 * @subpackage ecli
 * @copyright  2014 SSR / Joost van der Borg {@link http://ssr.nl}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class filter_ecli extends moodle_text_filter {
    public function filter($text, array $options = array()) {
        $target = '';
        $globaltarget = get_config('filter_ecli','target');
        if (isset($this->localconfig['target'])) {
            $target = ($this->localconfig['target'] == 'blank') ? 'target="_blank"' : '';
        } else if (isset($globaltarget)) {
            $target = ($globaltarget == 'blank') ? 'target="_blank"' : '';
        }
        return preg_replace('(ECLI:NL[a-zA-Z:0-9]*)',
            '<a '.$target.' href="http://uitspraken.rechtspraak.nl/inziendocument?id=$0">$0</a>',
            $text);
    }
}