<?php

/* main.php */
class __TwigTemplate_bdb7a800680ac48f82f1b2f60e0a66592962bde2d22fc07a4286c8d40e8fd6df extends Twig_Template
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
        echo "this is layout header;<br>
<?php echo \$content;?>
";
        // line 3
        if (isset($context["content"])) { $_content_ = $context["content"]; } else { $_content_ = null; }
        echo $_content_;
        echo "
this is layout footer;<br/>";
    }

    public function getTemplateName()
    {
        return "main.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
