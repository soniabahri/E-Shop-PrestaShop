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

/* @Product/ProductPage/Forms/form_combination.html.twig */
class __TwigTemplate_755821a999cb3725bbad6280d37d564640c5d3fccdf07dda2b041326b815e45d extends \Twig\Template
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
        echo "<tr class=\"combination loaded\" id=\"attribute_";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\" data=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\">
  <td width=\"1%\"><input class=\"js-combination\" type=\"checkbox\" data-id=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\"></td>
  <td class=\"img\"><div class=\"fake-img\"></div></td>
    <td>";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "name", []), "html", null, true);
        echo "</td>
    <td class=\"attribute-price\">
        <div class=\"input-group\">
            <div class=\"input-group-prepend\">
                <span class=\"input-group-text\">";
        // line 32
        echo twig_escape_filter($this->env, ($context["default_currency"] ?? null), "html", null, true);
        echo "</span>
            </div>
            <input type=\"text\" class=\"attribute_priceTE form-control text-sm-right\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "attribute_price", []), "html", null, true);
        echo "\">
        </div>
    </td>
    <td class=\"attribute-finalprice text-sm-right\">
      <span data-price=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "final_price", []), "html", null, true);
        echo "\" data-uniqid=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "final_price", []), "html", null, true);
        echo "</span> ";
        echo twig_escape_filter($this->env, ($context["default_currency"] ?? null), "html", null, true);
        echo "
    </td>
    ";
        // line 40
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 41
            echo "      <td class=\"attribute-quantity\">
          <div>
              <input type=\"text\" value=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "attribute_quantity", []), "html", null, true);
            echo "\" class=\"form-control text-sm-right\">
          </div>
      </td>
    ";
        }
        // line 47
        echo "
    <td class=\"attribute-actions\">
        <div class=\"btn-group btn-group-sm\" role=\"group\">
            <a href=\"#combination_form_";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\" class=\"btn btn-open tooltip-link btn-sm\"><i class=\"material-icons\">mode_edit</i></a>
        </div>
        <div id=\"combination_form_";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\" data=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\" class=\"combination-form hide row\">
            <div class=\"col-sm-12 nav\">
                ";
        // line 55
        echo "                <a class=\"btn-sensitive prev\"><i class=\"material-icons\">keyboard_arrow_left</i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Prev. combination", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</a>
                <a class=\"next btn-sensitive\">";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Next combination", [], "Admin.Catalog.Feature"), "html", null, true);
        echo " <i class=\"material-icons\">keyboard_arrow_right</i></a>
            </div>
            <div class=\"panel col-md-12 p-2\">
                <div class=\"float-left\">
                    <button type=\"button\" class=\"back-to-product btn btn-outline-secondary btn-back\"><i class=\"material-icons\">arrow_back</i> ";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Back to product", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "</button>
                </div>
                <h2 class=\"title pt-2\">
                  ";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combination details", [], "Admin.Catalog.Feature"), "html", null, true);
        echo " -
                  ";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "name", []), "html", null, true);
        echo "
                </h2>
                ";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_default", []), 'widget');
        echo "
                <div class=\"row\">
                  ";
        // line 68
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 69
            echo "                    <div class=\"col-md-2\">
                      <fieldset class=\"form-group\">
                          <label class=\"form-control-label\">
                            ";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_quantity", []), "vars", []), "label", []), "html", null, true);
            echo "
                          </label>
                          ";
            // line 74
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_quantity", []), 'errors');
            echo "
                          ";
            // line 75
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_quantity", []), 'widget');
            echo "
                      </fieldset>
                    </div>
                  ";
        }
        // line 79
        echo "                    <div class=\"col-md-3\">
                      <fieldset class=\"form-group\">
                          <label class=\"form-control-label\">";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "available_date_attribute", []), "vars", []), "label", []), "html", null, true);
        echo "</label>
                          ";
        // line 82
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "available_date_attribute", []), 'errors');
        echo "
                          ";
        // line 83
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "available_date_attribute", []), 'widget');
        echo "
                      </fieldset>
                    </div>
                    <div class=\"col-md-2\">
                      <fieldset class=\"form-group\">
                          <label class=\"form-control-label\">
                            ";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_minimal_quantity", []), "vars", []), "label", []), "html", null, true);
        echo "
                            <span class=\"help-box\" data-toggle=\"popover\"
                              data-content=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The minimum quantity required to buy this product (set to 1 to disable this feature). E.g.: if set to 3, customers will be able to purchase the product only if they take at least 3 in quantity.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                          </label>
                          ";
        // line 93
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_minimal_quantity", []), 'errors');
        echo "
                          ";
        // line 94
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_minimal_quantity", []), 'widget');
        echo "
                      </fieldset>
                    </div>
                    <div class=\"col-md-4\">
                      <fieldset class=\"form-group\">
                          <label class=\"form-control-label\">";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_reference", []), "vars", []), "label", []), "html", null, true);
        echo "</label>
                          ";
        // line 100
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_reference", []), 'errors');
        echo "
                          ";
        // line 101
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_reference", []), 'widget');
        echo "
                      </fieldset>
                    </div>
                </div>
                <h2 class=\"title\">
                  ";
        // line 106
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Stock", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
                </h2>
                <div class=\"row\">
                  <div class=\"col-md-3\">
                    <fieldset class=\"form-group\">
                      <label class=\"form-control-label\">";
        // line 111
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_location", []), "vars", []), "label", []), "html", null, true);
        echo "</label>
                      ";
        // line 112
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_location", []), 'errors');
        echo "
                      ";
        // line 113
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_location", []), 'widget');
        echo "
                    </fieldset>
                  </div>
                  <div class=\"col-md-3\">
                    <fieldset class=\"form-group\">
                      <label class=\"form-control-label\">";
        // line 118
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_low_stock_threshold", []), "vars", []), "label", []), "html", null, true);
        echo "</label>
                      ";
        // line 119
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_low_stock_threshold", []), 'errors');
        echo "
                      ";
        // line 120
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_low_stock_threshold", []), 'widget');
        echo "
                    </fieldset>
                  </div>
                  <div class=\"col-md-9\">
                    <fieldset class=\"form-group widget-checkbox-inline\">
                      <label class=\"form-control-label\">&nbsp;</label>
                      <div class=\"widget-checkbox-inline\">
                        ";
        // line 127
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_low_stock_alert", []), 'errors');
        echo "
                        ";
        // line 128
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_low_stock_alert", []), 'widget');
        echo "
                        <span class=\"help-box\" data-toggle=\"popover\" data-html=\"true\" data-content=\"";
        // line 129
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The email will be sent to all the users who have the right to run the stock page. To modify the permissions, go to [1]Advanced Parameters > Team[/1]", ["[1]" => (("<a href=&quot;" . $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminEmployees")) . "&quot;>"), "[/1]" => "</a>"], "Admin.Catalog.Help");
        echo "\" ></span>
                      </div>
                    </fieldset>
                  </div>
                </div>
                <h2 class=\"title\">
                  ";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Price and impact", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
                </h2>
                <div class=\"row\">
                    <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 140
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_wholesale_price", []), "vars", []), "label", []), "html", null, true);
        echo "</label>
                            ";
        // line 141
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_wholesale_price", []), 'errors');
        echo "
                            ";
        // line 142
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_wholesale_price", []), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">
                              ";
        // line 148
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_price", []), "vars", []), "label", []), "html", null, true);
        echo "
                              <span class=\"help-box\" data-toggle=\"popover\"
                                data-content=\"";
        // line 150
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Does this combination have a different price? Is it cheaper or more expensive than the default retail price?", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                            </label>
                            ";
        // line 152
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_price", []), 'errors');
        echo "
                            ";
        // line 153
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_price", []), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 158
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_priceTI", []), "vars", []), "label", []), "html", null, true);
        echo "</label>
                            ";
        // line 159
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_priceTI", []), 'errors');
        echo "
                            ";
        // line 160
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_priceTI", []), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-3\">
                      <small class=\"form-control-label vcenter\">";
        // line 164
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Final retail price (tax excl.) will be", [], "Admin.Catalog.Feature"), "html", null, true);
        echo " <span class=\"final-price\" data-price=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "final_price", []), "html", null, true);
        echo "\" data-uniqid=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "final_price", []), "html", null, true);
        echo "</span> ";
        echo twig_escape_filter($this->env, ($context["default_currency"] ?? null), "html", null, true);
        echo "</small>
                    </div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-3 ";
        // line 168
        if (($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_USE_ECOTAX") != 1)) {
            echo "hide";
        }
        echo "\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 170
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_ecotax", []), "vars", []), "label", []), "html", null, true);
        echo "</label>
                            ";
        // line 171
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_ecotax", []), 'errors');
        echo "
                            ";
        // line 172
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_ecotax", []), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">
                              ";
        // line 178
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_unity", []), "vars", []), "label", []), "html", null, true);
        echo "
                              <span class=\"help-box\" data-toggle=\"popover\"
                                data-content=\"";
        // line 180
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Does this combination have a different price per unit?", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "\" ></span>
                            </label>
                            ";
        // line 182
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_unity", []), 'errors');
        echo "
                            ";
        // line 183
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_unity", []), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 188
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_weight", []), "vars", []), "label", []), "html", null, true);
        echo "</label>
                            <div class=\"input-group\">
                                <div class=\"input-group-prepend\">
                                    <span class=\"input-group-text\">";
        // line 191
        echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_WEIGHT_UNIT"), "html", null, true);
        echo "</span>
                                </div>
                                ";
        // line 193
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_weight", []), 'errors');
        echo "
                                ";
        // line 194
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_weight", []), 'widget');
        echo "
                            </div>
                        </fieldset>
                    </div>
                </div>
                <h2 class=\"title\">
                  ";
        // line 200
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Specific references", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
                </h2>
                <div class=\"row\">
                    <div class=\"col-md-4\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 205
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_isbn", []), "vars", []), "label", []), "html", null, true);
        echo "</label>
                            ";
        // line 206
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_isbn", []), 'errors');
        echo "
                            ";
        // line 207
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_isbn", []), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-4\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">
                              ";
        // line 213
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_ean13", []), "vars", []), "label", []), "html", null, true);
        echo "
                              <span class=\"help-box\" data-toggle=\"popover\"
                                data-content=\"";
        // line 215
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This type of product code is specific to Europe and Japan, but is widely used internationally. It is a superset of the UPC code: all products marked with an EAN will be accepted in North America.", [], "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                            </label>
                            ";
        // line 217
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_ean13", []), 'errors');
        echo "
                            ";
        // line 218
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_ean13", []), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-4\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 223
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_upc", []), "vars", []), "label", []), "html", null, true);
        echo "</label>
                            ";
        // line 224
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_upc", []), 'errors');
        echo "
                            ";
        // line 225
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_upc", []), 'widget');
        echo "
                        </fieldset>
                    </div>
                    <div class=\"col-md-4\">
                        <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 230
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "attribute_mpn", []), "vars", []), "label", []), "html", null, true);
        echo "</label>
                            ";
        // line 231
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_mpn", []), 'errors');
        echo "
                            ";
        // line 232
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attribute_mpn", []), 'widget');
        echo "
                        </fieldset>
                    </div>
                </div>
                <h2 class=\"title\">
                  ";
        // line 237
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Images", [], "Admin.Catalog.Feature"), "html", null, true);
        echo "
                </h2>
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <fieldset class=\"form-group js-combination-images\">
                            <label>
                                <small class=\"form-control-label\">";
        // line 243
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "id_image_attr", []), "vars", []), "label", []), "html", null, true);
        echo "</small>
                                <small class=\"form-control-label number-of-images\"></small>
                            </label>
                            ";
        // line 246
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "id_image_attr", []), 'errors');
        echo "
                            ";
        // line 247
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "id_image_attr", []), 'widget');
        echo "
                        </fieldset>
                    </div>
                </div>

                <div class=\"row\">
                    <div class=\"col-md-12\">
                        ";
        // line 254
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsCombinationBottom", ["id_product" => $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product", []), "id_product_attribute" => $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", [])]);
        echo "
                    </div>
                </div>

                ";
        // line 258
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "id_product_attribute", []), 'widget');
        echo "
            </div>
        </div>
    </td>
    <td width=\"5%\">
      <a href=\"";
        // line 263
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_delete_attribute", ["idProduct" => $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product", [])]), "html", null, true);
        echo "\" class=\"btn tooltip-link btn-sm delete\" data=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\"><i class=\"material-icons\">delete</i></a>
    </td>
    <td>
      ";
        // line 266
        $context["checked"] = ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "attribute_default", []) == 1)) ? ("checked") : (""));
        // line 267
        echo "      <input class=\"attribute-default\" type=\"radio\" ";
        echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
        echo " data-id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", []), "value", []), "id_product_attribute", []), "html", null, true);
        echo "\">
    </td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "@Product/ProductPage/Forms/form_combination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  559 => 267,  557 => 266,  549 => 263,  541 => 258,  534 => 254,  524 => 247,  520 => 246,  514 => 243,  505 => 237,  497 => 232,  493 => 231,  489 => 230,  481 => 225,  477 => 224,  473 => 223,  465 => 218,  461 => 217,  456 => 215,  451 => 213,  442 => 207,  438 => 206,  434 => 205,  426 => 200,  417 => 194,  413 => 193,  408 => 191,  402 => 188,  394 => 183,  390 => 182,  385 => 180,  380 => 178,  371 => 172,  367 => 171,  363 => 170,  356 => 168,  341 => 164,  334 => 160,  330 => 159,  326 => 158,  318 => 153,  314 => 152,  309 => 150,  304 => 148,  295 => 142,  291 => 141,  287 => 140,  279 => 135,  270 => 129,  266 => 128,  262 => 127,  252 => 120,  248 => 119,  244 => 118,  236 => 113,  232 => 112,  228 => 111,  220 => 106,  212 => 101,  208 => 100,  204 => 99,  196 => 94,  192 => 93,  187 => 91,  182 => 89,  173 => 83,  169 => 82,  165 => 81,  161 => 79,  154 => 75,  150 => 74,  145 => 72,  140 => 69,  138 => 68,  133 => 66,  128 => 64,  124 => 63,  118 => 60,  111 => 56,  106 => 55,  99 => 52,  94 => 50,  89 => 47,  82 => 43,  78 => 41,  76 => 40,  65 => 38,  58 => 34,  53 => 32,  46 => 28,  39 => 26,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@Product/ProductPage/Forms/form_combination.html.twig", "C:\\wamp\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\Forms\\form_combination.html.twig");
    }
}
