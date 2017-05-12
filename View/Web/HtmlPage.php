<?php

namespace View\Web;

class HtmlPage
{

    /**
     *
     * @var string
     */
    protected $content;

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function display()
    {

        echo <<<'EOT'
<!DOCTYPE html>
<html>
  <head>
  <title>Battle Ships</title>
  </head>

  <body>
EOT;

        echo $this->content;

        echo <<<'EOT'
  </body>
</html>
EOT;
    }

}
