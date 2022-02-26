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

/* @PrestaShop/Admin/Improve/Design/positions.html.twig */
class __TwigTemplate_0d9a69fa6b3d029b764d4ea956d2afc184661737065048ed17b082bef48a723f extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Improve/Design/positions.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        // line 29
        echo "  <div class=\"row\">
    ";
        // line 30
        if ( !($context["canMove"] ?? null)) {
            // line 31
            echo "      <p class=\"alert alert-warning\">
        ";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If you want to order/move the following data, please select a shop from the shop list.", [], "Admin.Design.Notification"), "html", null, true);
            echo "
      </p>
    ";
        }
        // line 35
        echo "
    <div class=\"card col-9\">
      <div class=\"card-body\">
        <div class=\"card\">
          <form class=\"mt-2\" id=\"position-filters\">
            <div class=\"container\">
              <div class=\"row\">
                <div class=\"row col-md-12 col-lg-6\">
                  <label class=\"form-control-label col-4 text-left mt-1\">";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Show", [], "Admin.Actions"), "html", null, true);
        echo "</label>
                  <div class=\"col-8\">
                    <select id=\"show-modules\" class=\"filter\">
                      <option value=\"all\">";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("All modules", [], "Admin.Design.Feature"), "html", null, true);
        echo "&nbsp;</option>
                      ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 48
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "id", []), "html", null, true);
            echo "\"";
            if ((($context["selectedModule"] ?? null) == $this->getAttribute($context["module"], "id", []))) {
                echo " selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "displayName", []), "html", null, true);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "                    </select>
                  </div>
                </div>

                <div class=\"row col-md-12 col-lg-6\">
                  <label class=\"form-control-label col-5 text-center mt-1\">";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search for a hook", [], "Admin.Design.Feature"), "html", null, true);
        echo "</label>
                  <div class=\"input-group col-7\">
                    <div class=\"input-group-prepend\">
                      <div class=\"input-group-text\">
                        <i class=\"material-icons\">search</i>
                      </div>
                    </div>
                    <input type=\"text\" class=\"form-control\" id=\"hook-search\" name=\"hook-search\" placeholder=\"\">
                  </div>
                </div>
              </div>
            </div>

            <div class=\"container mt-3\">
              <div class=\"row\">
                <div class=\"col-lg-12\">
                  <p class=\"checkbox\">
                    <label class=\"form-control-label\" for=\"hook-position\">
                      <input type=\"checkbox\" id=\"hook-position\" />
                      <label class=\"selectbox\" for=\"hook-position\"><i class=\"material-icons done\">done</i></label>
                      ";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Display non-positionable hooks", [], "Admin.Design.Feature"), "html", null, true);
        echo "
                    </label>
                  </p>
                </div>
              </div>
            </div>
          </form>
        </div>

        <form id=\"module-positions-form\" method=\"post\" action=\"";
        // line 84
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_modules_positions_unhook");
        echo "\" data-update-url=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("api_improve_design_positions_update");
        echo "\">
          ";
        // line 85
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 86
            echo "            <section class=\"hook-panel";
            if ( !$this->getAttribute($context["hook"], "position", [], "array")) {
                echo " hook-position";
            }
            echo "\"";
            if ( !$this->getAttribute($context["hook"], "position", [], "array")) {
                echo " style=\"display:none;\"";
            }
            echo ">
              <a name=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "name", [], "array"), "html", null, true);
            echo "\"></a>
              <header class=\"hook-panel-header\">
                <span class=\"hook-name\">";
            // line 89
            echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "name", [], "array"), "html", null, true);
            echo "</span>
                <label class=\"badge badge-pill float-right\">
                  ";
            // line 91
            if (($this->getAttribute($context["hook"], "modules_count", [], "array") && ($context["canMove"] ?? null))) {
                // line 92
                echo "                    <input type=\"checkbox\" class=\"hook-checker\" id=\"Ghook";
                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                echo "\" data-hook-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                echo "\" />
                    <label class=\"selectbox\" for=\"Ghook";
                // line 93
                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                echo "\"><i class=\"material-icons done\">done</i></label>
                  ";
            }
            // line 95
            echo "
                  ";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "modules_count", [], "array"), "html", null, true);
            echo "
                  ";
            // line 97
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(((($this->getAttribute($context["hook"], "modules_count", [], "array") > 1)) ? ("Modules") : ("Module")), [], "Admin.Global"), "html", null, true);
            echo "
                </label>

                ";
            // line 100
            if ($this->getAttribute($context["hook"], "description", [], "array", true, true)) {
                // line 101
                echo "                  <div class=\"hook_description\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "description", [], "array"), "html", null, true);
                echo "</div>
                ";
            }
            // line 103
            echo "              </header>

              ";
            // line 105
            if ($this->getAttribute($context["hook"], "modules_count", [], "array")) {
                // line 106
                echo "                <section class=\"module-list\">
                  <ul class=\"list-unstyled";
                // line 107
                if (($this->getAttribute($context["hook"], "modules_count", [], "array") > 1)) {
                    echo " sortable";
                }
                echo "\">
                    ";
                // line 108
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["hook"], "modules", [], "array"));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                    if ($this->getAttribute(($context["modules"] ?? null), $this->getAttribute($context["module"], "id_module", [], "array"), [], "array", true, true)) {
                        // line 109
                        echo "                      ";
                        $context["moduleInstance"] = $this->getAttribute(($context["modules"] ?? null), $this->getAttribute($context["module"], "id_module", [], "array"), [], "array");
                        // line 110
                        echo "                      <li id=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                        echo "\"
                        class=\"module-position-";
                        // line 111
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "id", []), "html", null, true);
                        echo " module-item";
                        if ((($context["canMove"] ?? null) && ($this->getAttribute($context["hook"], "modules_count", [], "array") >= 2))) {
                            echo " draggable";
                        }
                        echo "\">

                        <div class=\"module-column-select\">
                          <i class=\"material-icons drag_indicator\">drag_indicator</i>
                          <input type=\"checkbox\" id=\"selecterbox";
                        // line 115
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                        echo "\" data-hook-id=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                        echo "\" class=\"modules-position-checkbox hook";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["hook"], "id_hook", [], "array"), "html", null, true);
                        echo "\" name=\"unhooks[]\" value=\"";
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                        echo "\"/>
                          <label class=\"selectbox\" for=\"selecterbox";
                        // line 116
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                        echo "\"><i class=\"material-icons done\">done</i></label>
                        </div>

                        <div class=\"module-column-icon\">
                          <img src=\"";
                        // line 120
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl((("../modules/" . $this->getAttribute(($context["moduleInstance"] ?? null), "name", [])) . "/logo.png")), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "displayName", []));
                        echo "\" />
                        </div>

                        <div class=\"module-column-infos\">
                          <span class=\"module-name\">
                            ";
                        // line 125
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "displayName", []));
                        echo "
                            ";
                        // line 126
                        if ($this->getAttribute(($context["moduleInstance"] ?? null), "version", [])) {
                            // line 127
                            echo "                              <small class=\"text-muted\">&nbsp;-&nbsp;";
                            echo twig_escape_filter($this->env, sprintf("v%s", $this->getAttribute(($context["moduleInstance"] ?? null), "version", [])), "html", null, true);
                            echo "</small>
                            ";
                        }
                        // line 129
                        echo "                          </span>
                        </div>

                        <div class=\"module-column-description";
                        // line 132
                        if (( !($context["selectedModule"] ?? null) && ($this->getAttribute($context["hook"], "modules_count", [], "array") > 1))) {
                            echo " hasColumnPosition";
                        }
                        echo " d-none d-md-table-cell\">
                          <span class=\"module-description\">";
                        // line 133
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "description", []));
                        echo "</span>
                        </div>

                        ";
                        // line 136
                        if (( !($context["selectedModule"] ?? null) && ($this->getAttribute($context["hook"], "modules_count", [], "array") > 1))) {
                            // line 137
                            echo "                          <div class=\"btn-toolbar text-center module-column-position";
                            if ((($context["canMove"] ?? null) && ($this->getAttribute($context["hook"], "modules_count", [], "array") >= 2))) {
                                echo " dragHandle";
                            }
                            echo "\" id=\"td_";
                            echo twig_escape_filter($this->env, (($this->getAttribute($context["hook"], "id_hook", [], "array") . "_") . $this->getAttribute(($context["moduleInstance"] ?? null), "id", [])), "html", null, true);
                            echo "\">
                            <div class=\"btn-group\">
                              <span class=\"index-position\">";
                            // line 139
                            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                            echo "</span>
                            </div>
                          </div>
                        ";
                        }
                        // line 143
                        echo "
                        <div class=\"module-column-actions\">
                          <div class=\"btn-group\">
                            ";
                        // line 146
                        $context["linkParams"] = ["id_module" => $this->getAttribute(                        // line 147
($context["moduleInstance"] ?? null), "id", []), "id_hook" => $this->getAttribute(                        // line 148
$context["hook"], "id_hook", [], "array"), "editGraft" => 1];
                        // line 151
                        echo "                            ";
                        if (($context["selectedModule"] ?? null)) {
                            // line 152
                            echo "                              ";
                            $context["linkParams"] = twig_array_merge(($context["linkParams"] ?? null), ["show_modules" => ($context["selectedModule"] ?? null)]);
                            // line 153
                            echo "                            ";
                        }
                        // line 154
                        echo "
                            <a class=\"btn tooltip-link\" href=\"";
                        // line 155
                        echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminModulesPositions", true, ($context["linkParams"] ?? null)), "html", null, true);
                        echo "\" aria-label=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Edit", [], "Admin.Actions"), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Edit", [], "Admin.Actions"), "html", null, true);
                        echo "\">
                              <i class=\"material-icons\">edit</i>
                            </a>

                            <a class=\"btn tooltip-link dropdown-toggle dropdown-toggle-dots dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" data-reference=\"parent\">
                            </a>

                            <div class=\"dropdown-menu\">
                              <a class=\"dropdown-item\" href=\"";
                        // line 163
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_modules_positions_unhook", ["moduleId" => $this->getAttribute(($context["moduleInstance"] ?? null), "id", []), "hookId" => $this->getAttribute($context["hook"], "id_hook", [], "array")]), "html", null, true);
                        echo "\">
                                <i class=\"material-icons\">indeterminate_check_box</i>
                                ";
                        // line 165
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unhook", [], "Admin.Design.Feature"), "html", null, true);
                        echo "
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class=\"module-column-description d-block d-md-none w-100\">
                          <span class=\"module-description\">";
                        // line 172
                        echo twig_escape_filter($this->env, $this->getAttribute(($context["moduleInstance"] ?? null), "description", []));
                        echo "</span>
                        </div>
                      </li>
                    ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 176
                echo "                  </ul>
                </section>
              ";
            }
            // line 179
            echo "            </section>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 181
        echo "
          <div id=\"unhook-button-position-bottom\">
            <button type=\"submit\" class=\"btn btn-default\" name=\"unhookform\">
              <i class=\"material-icons\">indeterminate_check_box</i>
              ";
        // line 185
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unhook the selection", [], "Admin.Design.Feature"), "html", null, true);
        echo "
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class=\"col-3\">
      <div class=\"card\" id=\"modules-position-selection-panel\">
        <h3 class=\"card-header\"><i class=\"material-icons\">checked</i> ";
        // line 194
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Selection", [], "Admin.Global"), "html", null, true);
        echo "</h3>
        <div class=\"card-body\">
          <p>
            <span id=\"modules-position-single-selection\">";
        // line 197
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("1 module selected", [], "Admin.Design.Feature"), "html", null, true);
        echo "</span>
            <span id=\"modules-position-multiple-selection\">
              <span id=\"modules-position-selection-count\"></span> ";
        // line 199
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("modules selected", [], "Admin.Design.Feature"), "html", null, true);
        echo "
            </span>
          </p>
          <div class=\"text-center\">
            <button class=\"btn btn-primary\"><i class=\"icon-remove\"></i> ";
        // line 203
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unhook the selection", [], "Admin.Design.Feature"), "html", null, true);
        echo "</button>
          </div>
        </div>
      </div>
    </div>
  </div>
";
    }

    // line 211
    public function block_javascripts($context, array $blocks = [])
    {
        // line 212
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script src=\"";
        // line 213
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/improve_design_positions.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/positions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  456 => 213,  451 => 212,  448 => 211,  437 => 203,  430 => 199,  425 => 197,  419 => 194,  407 => 185,  401 => 181,  394 => 179,  389 => 176,  375 => 172,  365 => 165,  360 => 163,  345 => 155,  342 => 154,  339 => 153,  336 => 152,  333 => 151,  331 => 148,  330 => 147,  329 => 146,  324 => 143,  317 => 139,  307 => 137,  305 => 136,  299 => 133,  293 => 132,  288 => 129,  282 => 127,  280 => 126,  276 => 125,  266 => 120,  259 => 116,  249 => 115,  238 => 111,  233 => 110,  230 => 109,  219 => 108,  213 => 107,  210 => 106,  208 => 105,  204 => 103,  198 => 101,  196 => 100,  190 => 97,  186 => 96,  183 => 95,  178 => 93,  171 => 92,  169 => 91,  164 => 89,  159 => 87,  148 => 86,  144 => 85,  138 => 84,  126 => 75,  103 => 55,  96 => 50,  81 => 48,  77 => 47,  73 => 46,  67 => 43,  57 => 35,  51 => 32,  48 => 31,  46 => 30,  43 => 29,  40 => 28,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/positions.html.twig", "C:\\wamp\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\positions.html.twig");
    }
}
