<?php

/* index.php */
class __TwigTemplate_df27c19e5f77bf8c09ab8249edbaf68883397a449dc2e323b6b13e8dc5ae9711 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "this is view
";
        // line 2
        if (isset($context["username"])) { $_username_ = $context["username"]; } else { $_username_ = null; }
        echo $_username_;
        echo "
<br/>
<b>aaa</b>";
    }

    public function getTemplateName()
    {
        return "index.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
