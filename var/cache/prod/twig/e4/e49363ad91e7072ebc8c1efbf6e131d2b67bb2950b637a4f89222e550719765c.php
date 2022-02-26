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

/* @PrestaShop/Admin/Sell/Order/Order/index.html.twig */
class __TwigTemplate_4af9176b454c6e0a10e5554189f6fd59d4fac82f76ad8aac760c8d060ba83119 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'orders_kpi' => [$this, 'block_orders_kpi'],
            'order_grid_row' => [$this, 'block_order_grid_row'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 26
        return "PrestaShopBundle:Admin:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "@PrestaShop/Admin/Sell/Order/Order/index.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        // line 29
        echo "  ";
        $this->loadTemplate("@PrestaShop/Admin/Sell/Order/Order/Blocks/change_orders_status_modal.html.twig", "@PrestaShop/Admin/Sell/Order/Order/index.html.twig", 29)->display($context);
        // line 30
        echo "
  ";
        // line 31
        $this->displayBlock('orders_kpi', $context, $blocks);
        // line 45
        echo "
  ";
        // line 46
        $this->displayBlock('order_grid_row', $context, $blocks);
    }

    // line 31
    public function block_orders_kpi($context, array $blocks = [])
    {
        // line 32
        echo "    <div class=\"row\">
      <div class=\"col-md-12\">
        <div class=\"card\">
          <div class=\"row orders-kpi\">
            ";
        // line 36
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("PrestaShopBundle:Admin\\Common:renderKpiRow", ["kpiRow" =>         // line 38
($context["orderKpi"] ?? null)]));
        // line 39
        echo "
          </div>
        </div>
      </div>
    </div>
  ";
    }

    // line 46
    public function block_order_grid_row($context, array $blocks = [])
    {
        // line 47
        echo "    <div class=\"row\">
      <div class=\"col-12\">
        ";
        // line 49
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Sell/Order/Order/index.html.twig", 49)->display(twig_array_merge($context, ["grid" => ($context["orderGrid"] ?? null)]));
        // line 50
        echo "      </div>
    </div>
  ";
    }

    // line 55
    public function block_javascripts($context, array $blocks = [])
    {
        // line 56
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

  <script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/order.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Order/Order/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 59,  105 => 58,  99 => 56,  96 => 55,  90 => 50,  88 => 49,  84 => 47,  81 => 46,  72 => 39,  70 => 38,  69 => 36,  63 => 32,  60 => 31,  56 => 46,  53 => 45,  51 => 31,  48 => 30,  45 => 29,  42 => 28,  32 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Order/Order/index.html.twig", "C:\\wamp\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Sell\\Order\\Order\\index.html.twig");
    }
}
