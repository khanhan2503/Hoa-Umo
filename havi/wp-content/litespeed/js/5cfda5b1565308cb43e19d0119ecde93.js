!function(){function t(e){return t="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},t(e)}function e(t,e){var a="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!a){if(Array.isArray(t)||(a=o(t))||e&&t&&"number"==typeof t.length){a&&(t=a);var i=0,n=function(){};return{s:n,n:function(){return i>=t.length?{done:!0}:{done:!1,value:t[i++]}},e:function(t){throw t},f:n}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var r,s=!0,l=!1;return{s:function(){a=a.call(t)},n:function(){var t=a.next();return s=t.done,t},e:function(t){l=!0,r=t},f:function(){try{s||null==a.return||a.return()}finally{if(l)throw r}}}}function a(t,e){for(var a=0;a<e.length;a++){var i=e[a];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(t,i.key,i)}}function i(t,e,a){return e in t?Object.defineProperty(t,e,{value:a,enumerable:!0,configurable:!0,writable:!0}):t[e]=a,t}function n(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){var a=null==t?null:"undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(null!=a){var i,n,o=[],r=!0,s=!1;try{for(a=a.call(t);!(r=(i=a.next()).done)&&(o.push(i.value),!e||o.length!==e);r=!0);}catch(t){s=!0,n=t}finally{try{r||null==a.return||a.return()}finally{if(s)throw n}}return o}}(t,e)||o(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function o(t,e){if(t){if("string"==typeof t)return r(t,e);var a=Object.prototype.toString.call(t).slice(8,-1);return"Object"===a&&t.constructor&&(a=t.constructor.name),"Map"===a||"Set"===a?Array.from(t):"Arguments"===a||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(a)?r(t,e):void 0}}function r(t,e){(null==e||e>t.length)&&(e=t.length);for(var a=0,i=new Array(e);a<e;a++)i[a]=t[a];return i}!function(o){"use strict";var r=function(t){return!!t.path&&-1!==t.path.indexOf("woo-variation-swatches")||!!t.url&&-1!==t.url.indexOf("woo-variation-swatches")};o.createMiddlewareForExtraQueryParams=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};return function(e,a){if(r(e)&&Object.keys(t).length>0)for(var o=0,s=Object.entries(t);o<s.length;o++){var l=n(s[o],2),c=l[0],u=l[1];"string"!=typeof e.url||wp.url.hasQueryArg(e.url,c)||(e.url=wp.url.addQueryArgs(e.url,i({},c,u))),"string"!=typeof e.path||wp.url.hasQueryArg(e.path,c)||(e.path=wp.url.addQueryArgs(e.path,i({},c,u)))}return a(e)}};var s,l=(s=jQuery,function(){function t(e,a,n){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),i(this,"defaults",{}),this.name=n,this.element=e,this.$element=s(e),this.settings=s.extend(!0,{},this.defaults,a),this.product_variations=this.$element.data("product_variations")||[],this.is_ajax_variation=this.product_variations.length<1,this.product_id=this.$element.data("product_id"),this.reset_variations=this.$element.find(".reset_variations"),this.attributeFields=this.$element.find(".variations select"),this.selected_item_template='<span class="woo-selected-variation-item-name" data-default=""></span>',this.$element.addClass("wvs-loaded"),this.init(),this.update(),s(document).trigger("woo_variation_swatches_loaded",this)}var r,l,c;return r=t,(l=[{key:"isAjaxVariation",value:function(){return this.is_ajax_variation}},{key:"init",value:function(){this.prepareLabel(),this.prepareItems(),this.setupItems(),this.setupEvents(),this.setUpStockInfo()}},{key:"prepareLabel",value:function(){var t=this;woo_variation_swatches_options.show_variation_label&&this.$element.find(".variations .label").each((function(e,a){s(a).append(t.selected_item_template)}))}},{key:"prepareItems",value:function(){this.$element.find("ul.variable-items-wrapper").each((function(t,e){s(e).parent().addClass("woo-variation-items-wrapper")}))}},{key:"setupItems",value:function(){var t=this;this.$element.find("ul.variable-items-wrapper").each((function(e,a){var i="",n=s(a).parent().prev().find(".woo-selected-variation-item-name"),o=s(a).parent().find("select.woo-variation-raw-select"),r=o.find("option"),l=o.find("option:disabled"),c=o.find("option.enabled.out-of-stock"),u=o.find("option:selected"),d=o.find("option").eq(1),v=[],f=[],h=[];r.each((function(){""!==s(this).val()&&(v.push(s(this).val()),i=0===u.length?d.val():u.val())})),l.each((function(){""!==s(this).val()&&f.push(s(this).val())})),c.each((function(){""!==s(this).val()&&h.push(s(this).val())}));var p=_.difference(v,f);t.setupItem(a,i,p,h,n)}))}},{key:"setupItem",value:function(t,e,a,i,n){var o=this;s(t).find("li.variable-item").each((function(t,r){var l=s(r).attr("data-value"),c=s(r).attr("data-title");s(r).removeClass("selected disabled no-stock").addClass("disabled"),s(r).attr("aria-checked","false"),s(r).attr("tabindex","-1"),s(r).attr("data-wvstooltip-out-of-stock",""),s(r).find("input.variable-item-radio-input:radio").prop("disabled",!0).prop("checked",!1),e.length<1&&woo_variation_swatches_options.show_variation_label&&n.text(""),o.isAjaxVariation()?(s(r).find("input.variable-item-radio-input:radio").prop("disabled",!1),s(r).removeClass("selected disabled no-stock"),l===e&&(s(r).addClass("selected"),s(r).attr("aria-checked","true"),s(r).attr("tabindex","0"),s(r).find("input.variable-item-radio-input:radio").prop("disabled",!1).prop("checked",!0),woo_variation_swatches_options.show_variation_label&&n.text("".concat(woo_variation_swatches_options.variation_label_separator," ").concat(c)),s(r).trigger("wvs-item-updated",[e,l]))):(_.includes(a,l)&&(s(r).removeClass("selected disabled"),s(r).removeAttr("aria-hidden"),s(r).attr("tabindex","0"),s(r).find("input.variable-item-radio-input:radio").prop("disabled",!1),l===e&&(s(r).addClass("selected"),s(r).attr("aria-checked","true"),s(r).find("input.variable-item-radio-input:radio").prop("checked",!0),woo_variation_swatches_options.show_variation_label&&n.text("".concat(woo_variation_swatches_options.variation_label_separator," ").concat(c)),s(r).trigger("wvs-item-updated",[e,l]))),_.includes(i,l)&&woo_variation_swatches_options.clickable_out_of_stock&&(s(r).removeClass("disabled").addClass("no-stock"),s(r).attr("data-wvstooltip-out-of-stock",woo_variation_swatches_options.out_of_stock_tooltip_text)))}))}},{key:"setupEvents",value:function(){var t=this;this.$element.find("ul.variable-items-wrapper").each((function(e,a){var i=s(a).parent().find("select.woo-variation-raw-select");woo_variation_swatches_options.clear_on_reselect?(s(a).on("click.wvs","li.variable-item:not(.selected):not(.radio-variable-item)",(function(e){e.preventDefault(),e.stopPropagation();var a=s(this).data("value");i.val(a).trigger("change"),i.trigger("click"),woo_variation_swatches_options.is_mobile,s(this).trigger("wvs-selected-item",[a,i,t.$element])})),s(a).on("click.wvs","li.variable-item.selected:not(.radio-variable-item)",(function(e){e.preventDefault(),e.stopPropagation();var a=s(this).val();i.val("").trigger("change"),i.trigger("click"),woo_variation_swatches_options.is_mobile,s(this).trigger("wvs-unselected-item",[a,i,t.$element])})),s(a).on("click.wvs","input.variable-item-radio-input:radio",(function(t){t.stopPropagation(),s(this).trigger("change.wvs",{radioChange:!0})})),s(a).on("change.wvs","input.variable-item-radio-input:radio",(function(e,a){if(e.preventDefault(),e.stopPropagation(),a&&a.radioChange){var n=s(this).val();s(this).parent("li.radio-variable-item").hasClass("selected")?(i.val("").trigger("change"),s(this).parent("li.radio-variable-item").trigger("wvs-unselected-item",[n,i,t.$element])):(i.val(n).trigger("change"),s(this).parent("li.radio-variable-item").trigger("wvs-selected-item",[n,i,t.$element])),i.trigger("click"),woo_variation_swatches_options.is_mobile}}))):(s(a).on("click.wvs","li.variable-item:not(.radio-variable-item)",(function(e){e.preventDefault(),e.stopPropagation();var a=s(this).data("value");i.val(a).trigger("change"),i.trigger("click"),woo_variation_swatches_options.is_mobile,s(this).trigger("wvs-selected-item",[a,i,t.$element])})),s(a).on("change.wvs","input.variable-item-radio-input:radio",(function(e){e.preventDefault(),e.stopPropagation();var a=s(this).val();i.val(a).trigger("change"),i.trigger("click"),woo_variation_swatches_options.is_mobile,s(this).parent("li.radio-variable-item").removeClass("selected disabled no-stock").addClass("selected"),s(this).parent("li.radio-variable-item").trigger("wvs-selected-item",[a,i,t.$element])}))),s(a).on("keydown.wvs","li.variable-item:not(.disabled)",(function(t){(t.keyCode&&32===t.keyCode||t.key&&" "===t.key||t.keyCode&&13===t.keyCode||t.key&&"enter"===t.key.toLowerCase())&&(t.preventDefault(),s(this).trigger("click"))}))})),this.$element.on("click.wvs",".woo-variation-swatches-variable-item-more",(function(t){t.preventDefault(),s(this).parent().removeClass("enabled-display-limit-mode enabled-catalog-display-limit-mode"),s(this).remove()})),this.$element.find("[data-wvstooltip]").each((function(t,e){s(e).on("mouseenter",(function(t){var a=e.getBoundingClientRect(),i=o.getComputedStyle(e,":before"),n=o.getComputedStyle(e,":after"),r=parseInt(n.getPropertyValue("border-top-width"),10),s=parseInt(i.getPropertyValue("height"),10),l=parseInt(i.getPropertyValue("width"),10),c=s+r+2;e.classList.toggle("wvs-tooltip-position-bottom",a.top<c);var u=l/2,d=a.left+a.width/2,v=u-d,f=u>d,h=u+d,p=document.body.clientWidth<h,m=document.body.clientWidth-h;e.style.setProperty("--horizontal-position","0px"),f&&e.style.setProperty("--horizontal-position","".concat(v+2,"px")),p&&e.style.setProperty("--horizontal-position","".concat(m-2,"px"))}))}))}},{key:"update",value:function(){var t=this;this.$element.on("woocommerce_variation_has_changed.wvs",(function(e){t.setupItems()}))}},{key:"setUpStockInfo",value:function(){var t=this;if(woo_variation_swatches_options.show_variation_stock){var e=parseInt(woo_variation_swatches_options.stock_label_threshold,10);this.$element.on("wvs-selected-item.wvs",(function(a){var i=t.getChosenAttributes(),n=t.findStockVariations(t.product_variations,i);i.count>1&&i.count===i.chosenCount&&t.resetStockInfo(),i.count>1&&i.count===i.mayChosenCount&&n.forEach((function(a){var i='[data-attribute_name="'.concat(a.attribute_name,'"] > [data-value="').concat(a.attribute_value,'"]');a.variation.is_in_stock&&a.variation.max_qty&&a.variation.variation_stock_left&&a.variation.max_qty<=e?(t.$element.find("".concat(i," .wvs-stock-left-info")).attr("data-wvs-stock-info",a.variation.variation_stock_left),t.$element.find(i).addClass("wvs-show-stock-left-info")):(t.$element.find(i).removeClass("wvs-show-stock-left-info"),t.$element.find("".concat(i," .wvs-stock-left-info")).attr("data-wvs-stock-info",""))}))})),this.$element.on("hide_variation.wvs",(function(){t.resetStockInfo()}))}}},{key:"resetStockInfo",value:function(){this.$element.find(".variable-item").removeClass("wvs-show-stock-left-info"),this.$element.find(".wvs-stock-left-info").attr("data-wvs-stock-info","")}},{key:"getChosenAttributes",value:function(){var t={},e=0,a=0;return this.attributeFields.each((function(){var i=s(this).data("attribute_name")||s(this).attr("name"),n=s(this).val()||"";n.length>0&&a++,e++,t[i]=n})),{count:e,chosenCount:a,mayChosenCount:a+1,data:t}}},{key:"findStockVariations",value:function(t,a){for(var o=[],r=0,s=Object.entries(a.data);r<s.length;r++){var l=n(s[r],2),c=l[0];if(0===l[1].length){var u,d=e(this.$element.find("ul[data-attribute_name='".concat(c,"']")).data("attribute_values")||[]);try{for(d.s();!(u=d.n()).done;){var v=u.value,f=_.extend(a.data,i({},c,v)),h=this.findMatchingVariations(t,f);if(h.length>0){var p=h.shift(),m={};m.attribute_name=c,m.attribute_value=v,m.variation=p,o.push(m)}}}catch(t){d.e(t)}finally{d.f()}}}return o}},{key:"findMatchingVariations",value:function(t,e){for(var a=[],i=0;i<t.length;i++){var n=t[i];this.isMatch(n.attributes,e)&&a.push(n)}return a}},{key:"isMatch",value:function(t,e){var a=!0;for(var i in t)if(t.hasOwnProperty(i)){var n=t[i],o=e[i];void 0!==n&&void 0!==o&&0!==n.length&&0!==o.length&&n!==o&&(a=!1)}return a}},{key:"destroy",value:function(){this.$element.removeClass("wvs-loaded"),this.$element.removeData(this.name)}}])&&a(r.prototype,l),c&&a(r,c),Object.defineProperty(r,"prototype",{writable:!1}),t}()),c=function(e){return function(a,i){e.fn[a]=function(n){for(var o=this,r=arguments.length,s=new Array(r>1?r-1:0),l=1;l<r;l++)s[l-1]=arguments[l];return this.each((function(r,l){var c=e(l),u=c.data(a);if(u||(u=new i(c,e.extend({},n),a),c.data(a,u)),"string"==typeof n){if("object"===t(u[n]))return u[n];var d;if("function"==typeof u[n])return(d=u)[n].apply(d,s)}return o}))},e.fn[a].Constructor=i,e[a]=function(t){for(var i,n=arguments.length,o=new Array(n>1?n-1:0),r=1;r<n;r++)o[r-1]=arguments[r];return(i=e({}))[a].apply(i,[t].concat(o))},e.fn[a].noConflict=function(){return e.fn[a]}}}(jQuery);c("WooVariationSwatches",l)}(window)}(),jQuery((function(t){try{t(document).on("woo_variation_swatches_init",(function(){t(".variations_form:not(.wvs-loaded)").WooVariationSwatches(),t(".woo_variation_swatches_variations_form:not(.wvs-loaded)").WooVariationSwatches(),t(".ywcp_inner_selected_container:not(.wvs-loaded)").WooVariationSwatches()}))}catch(t){window.console.log("Variation Swatches:",t)}t(document).on("wc_variation_form.wvs",(function(e){t(document).trigger("woo_variation_swatches_init")})),t(document).ajaxComplete((function(e,a,i){_.delay((function(){t(".variations_form:not(.wvs-loaded)").each((function(){t(this).wc_variation_form()}))}),1e3)})),t(document.body).on("wc-composite-initializing",".composite_data",(function(e,a){a.actions.add_action("component_options_state_changed",(function(e){t(e.$component_content).find(".variations_form").WooVariationSwatches("destroy")}))}))}));
;