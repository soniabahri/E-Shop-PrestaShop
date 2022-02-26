<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @PrestaShop/Admin/Common/Grid/Columns/Content/date_time.html.twig */
class __TwigTemplate_6e5873bccb472bfba526c669fea52330760c8b71449873007ea85fcfcb1aa07d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        $context["valueToDisplay"] = twig_date_format_filter($this->env, $this->getAttribute(($context["record"] ?? null), $this->getAttribute(($context["column"] ?? null), "id", []), [], "array"), $this->getAttribute($this->getAttribute(($context["column"] ?? null), "options", []), "format", []));
        // line 27
        echo "
";
        // line 28
        if (($this->getAttribute(($context["record"] ?? null), $this->getAttribute(($context["column"] ?? null), "id", []), [], "array") == twig_constant("PrestaShop\\PrestaShop\\Core\\Util\\DateTime\\DateTime::NULL_VALUE"))) {
            // line 29
            echo "  ";
            $context["valueToDisplay"] = $this->getAttribute($this->getAttribute(($context["column"] ?? null), "options", []), "empty_data", []);
        }
        // line 31
        echo "
";
        // line 32
        echo twig_escape_filter($this->env, ($context["valueToDisplay"] ?? null), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/date_time.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 32,  44 => 31,  40 => 29,  38 => 28,  35 => 27,  33 => 26,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/date_time.html.twig", "C:\\wamp\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\Columns\\Content\\date_time.html.twig");
    }
}
