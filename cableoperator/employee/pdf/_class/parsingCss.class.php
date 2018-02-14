 add to the CSS content
                $style.= $content."\n";
            }
        }

        // extract the style tags des tags style, and remove them in the html code
        preg_match_all('/<style[^>]*>(.*)<\/style[^>]*>/isU', $html, $match);
        $html = preg_replace('/<style[^>]*>(.*)<\/style[^>]*>/isU', '', $html);

        // analyse each style tags
        foreach ($match[1] as $code) {
            // add to the CSS content
            $code = str_replace('<!--', '', $code);
            $code = str_replace('-->', '', $code);
            $style.= $code."\n";
        }

        //analyse the css content
        $this->_analyseStyle($style);
    }
}