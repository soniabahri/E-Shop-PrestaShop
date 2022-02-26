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

/* @PrestaShop/Admin/Common/Grid/Blocks/table.html.twig */
class __TwigTemplate_4e64d702ab4f14053150468c785d5c91fca8ba1dd9907152f9558c55b4359b24 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'grid_table_head' => [$this, 'block_grid_table_head'],
            'grid_table_body' => [$this, 'block_grid_table_body'],
            'grid_table_footer' => [$this, 'block_grid_table_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminGridTableBefore", ["grid" =>         // line 30
($context["grid"] ?? null), "legacy_controller" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 31
($context["app"] ?? null), "request", []), "attributes", []), "get", [0 => "_legacy_controller"], "method"), "controller" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 32
($context["app"] ?? null), "request", []), "attributes", []), "get", [0 => "_controller"], "method")]);
        // line 35
        echo "

";
        // line 37
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock($this->getAttribute(($context["grid"] ?? null), "filter_form", []), 'form_start', ["attr" => ["id" => ($this->getAttribute(($context["grid"] ?? null), "id", []) . "_filter_form"), "class" => "table-responsive"]]);
        echo "

<table class=\"grid-table js-grid-table table ";
        // line 39
        if ($this->env->getExtension('PrestaShopBundle\Twig\Extension\GridExtension')->isOrderingColumn(($context["grid"] ?? null))) {
            echo "grid-ordering-column";
        }
        echo " ";
        if ($this->getAttribute($this->getAttribute(($context["grid"] ?? null), "attributes", []), "is_empty_state", [])) {
            echo "border-0";
        }
        echo "\"
       id=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute(($context["grid"] ?? null), "id", []), "html", null, true);
        echo "_grid_table\"
       data-query=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["grid"] ?? null), "data", []), "query", []), "html", null, true);
        echo "\"
>
  <thead class=\"thead-default\">
  ";
        // line 44
        $this->displayBlock('grid_table_head', $context, $blocks);
        // line 48
        echo "  </thead>
  <tbody>
  ";
        // line 50
        $this->displayBlock('grid_table_body', $context, $blocks);
        // line 65
        echo "  </tbody>
  ";
        // line 66
        $this->displayBlock('grid_table_footer', $context, $blocks);
        // line 67
        echo "</table>
";
        // line 68
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock($this->getAttribute(($context["grid"] ?? null), "filter_form", []), 'form_end');
        echo "

";
        // line 70
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminGridTableAfter", ["grid" =>         // line 74
($context["grid"] ?? null), "legacy_controller" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 75
($context["app"] ?? null), "request", []), "attributes", []), "get", [0 => "_legacy_controller"], "method"), "controller" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 76
($context["app"] ?? null), "request", []), "attributes", []), "get", [0 => "_controller"], "method")]);
        // line 79
        echo "
";
    }

    // line 44
    public function block_grid_table_head($context, array $blocks = [])
    {
        // line 45
        echo "    ";
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/Table/headers_row.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
    ";
        // line 46
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/Table/filters_row.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
  ";
    }

    // line 50
    public function block_grid_table_body($context, array $blocks = [])
    {
        // line 51
        echo "    ";
        if ( !twig_test_empty($this->getAttribute($this->getAttribute(($context["grid"] ?? null), "data", []), "records", []))) {
            // line 52
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["grid"] ?? null), "data", []), "records", []));
            foreach ($context['_seq'] as $context["_key"] => $context["record"]) {
                // line 53
                echo "        <tr>
          ";
                // line 54
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["grid"] ?? null), "columns", []));
                foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                    // line 55
                    echo "            <td class=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "type", []), "html", null, true);
                    echo "-type column-";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["column"], "id", []), "html", null, true);
                    if (($this->getAttribute($this->getAttribute($context["column"], "options", [], "any", false, true), "clickable", [], "any", true, true) && $this->getAttribute($this->getAttribute($context["column"], "options", []), "clickable", []))) {
                        echo " clickable";
                    }
                    echo "\">
              ";
                    // line 56
                    echo $this->env->getExtension('PrestaShopBundle\Twig\Extension\GridExtension')->renderColumnContent($context["record"], $context["column"], ($context["grid"] ?? null));
                    echo "
            </td>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 59
                echo "        </tr>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['record'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "    ";
        } else {
            // line 62
            echo "      ";
            echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/Table/empty_row.html.twig", ["grid" => ($context["grid"] ?? null)]);
            echo "
    ";
        }
        // line 64
        echo "  ";
    }

    // line 66
    public function block_grid_table_footer($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Blocks/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 66,  168 => 64,  162 => 62,  159 => 61,  152 => 59,  143 => 56,  133 => 55,  129 => 54,  126 => 53,  121 => 52,  118 => 51,  115 => 50,  109 => 46,  104 => 45,  101 => 44,  96 => 79,  94 => 76,  93 => 75,  92 => 74,  91 => 70,  86 => 68,  83 => 67,  81 => 66,  78 => 65,  76 => 50,  72 => 48,  70 => 44,  64 => 41,  60 => 40,  50 => 39,  45 => 37,  41 => 35,  39 => 32,  38 => 31,  37 => 30,  36 => 26,  33 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Blocks/table.html.twig", "C:\\wamp\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Common\\Grid\\Blocks\\table.html.twig");
    }
}
