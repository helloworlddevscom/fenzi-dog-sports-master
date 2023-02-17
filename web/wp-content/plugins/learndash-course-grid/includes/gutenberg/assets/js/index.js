!function(){"use strict";var e={n:function(t){var o=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(o,{a:o}),o},d:function(t,o){for(var r in o)e.o(o,r)&&!e.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:o[r]})},o:function(e,t){return Object.prototype.hasOwnProperty.call(e,t)}},t=window.wp.element,o=window.wp.i18n,r=window.wp.blocks,l=window.wp.blockEditor,a=window.wp.components,n=window.wp.serverSideRender,i=e.n(n);class s extends t.Component{constructor(e){super(e)}render(){const{context:e,course_grid_id:r,search:l,taxonomies:n,price:i,price_min:s,price_max:c,setAttributes:d}=this.props;let _="search",u="taxonomies",m="price",h="price_min",p="price_max";"page"==e&&(_="filter_search",u="filter_taxonomies",m="filter_price",h="filter_price_min",p="filter_price_max");const g=LearnDash_Course_Grid_Block_Editor.taxonomies;return(0,t.createElement)(a.PanelBody,{title:(0,o.__)("Filter","learndash-course-grid"),initialOpen:"page"!=e},"widget"==e&&(0,t.createElement)(a.TextControl,{label:(0,o.__)("Course Grid ID"),help:(0,o.__)("Course grid ID the filter is for."),value:r||"",type:"text",onChange:e=>d({course_grid_id:e})}),(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Search","learndash-course-grid"),checked:l,onChange:e=>{d({[_]:e})}}),(0,t.createElement)(a.BaseControl,null,(0,t.createElement)(a.SelectControl,{multiple:!0,label:(0,o.__)("Taxonomies","learndash-course-grid"),help:(0,o.__)("Hold ctrl on Windows or cmd on Mac to select multiple values.","learndash-course-grid"),options:g,value:n||[],onChange:e=>{d({[u]:e})}})),(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Price","learndash-course-grid"),checked:i,onChange:e=>{d({[m]:e})}}),(0,t.createElement)(a.BaseControl,null,(0,t.createElement)(a.TextControl,{label:(0,o.__)("Price Min"),className:"left",value:s||0,type:"number",onChange:e=>{d({[h]:e})}}),(0,t.createElement)(a.TextControl,{label:(0,o.__)("Price Max"),className:"right",value:c||0,type:"number",onChange:e=>{d({[p]:e})}}),(0,t.createElement)("div",{style:{clear:"both"}})))}}var c=s;(0,r.registerBlockType)("learndash/ld-course-grid",{title:(0,o.__)("LearnDash Course Grid","learndash-course-grid"),description:(0,o.__)("Build LearnDash course grid easily.","learndash-course-grid"),icon:"grid-view",category:"learndash-blocks",supports:{customClassName:!0},attributes:{post_type:{type:"string",default:LearnDash_Course_Grid_Block_Editor.is_learndash_active?"sfwd-courses":"post"},per_page:{type:"string",default:9},orderby:{type:"string",default:"ID"},order:{type:"string",default:"DESC"},taxonomies:{type:"string",default:""},enrollment_status:{type:"string",default:""},progress_status:{type:"string",default:""},thumbnail:{type:"boolean",default:1},thumbnail_size:{type:"string",default:"course-thumbnail"},ribbon:{type:"boolean",default:1},content:{type:"boolean",default:1},title:{type:"boolean",default:1},title_clickable:{type:"boolean",default:1},description:{type:"boolean",default:1},description_char_max:{type:"string",default:120},post_meta:{type:"boolean",default:1},button:{type:"boolean",default:1},pagination:{type:"string",default:"button"},grid_height_equal:{type:"boolean",default:0},progress_bar:{type:"boolean",default:0},filter:{type:"boolean",default:1},skin:{type:"string",default:"grid"},card:{type:"string",default:"grid-1"},columns:{type:"string",default:3},min_column_width:{type:"string",default:250},items_per_row:{type:"string",default:5},font_family_title:{type:"string"},font_family_description:{type:"string",default:""},font_size_title:{type:"string",default:""},font_size_description:{type:"string",default:""},font_color_title:{type:"string",default:""},font_color_description:{type:"string",default:""},background_color_title:{type:"string",default:""},background_color_description:{type:"string",default:""},background_color_ribbon:{type:"string",default:""},font_color_ribbon:{type:"string",default:""},background_color_icon:{type:"string",default:""},font_color_icon:{type:"string",default:""},background_color_button:{type:"string",default:""},font_color_button:{type:"string",default:""},id:{type:"string",default:""},preview_show:{type:"boolean",default:1},display_state:{type:"object",default:{}},filter_search:{type:"boolean",default:1},filter_taxonomies:{type:"array",default:["category","post_tag"]},filter_price:{type:"boolean",default:1},filter_price_min:{type:"string",default:0},filter_price_max:{type:"string",default:1e3}},edit:e=>{const{attributes:{post_type:r,per_page:n,orderby:s,order:d,taxonomies:_,enrollment_status:u,progress_status:m,thumbnail:h,thumbnail_size:p,ribbon:g,content:b,title:f,title_clickable:C,description:y,description_char_max:E,post_meta:v,button:w,pagination:k,grid_height_equal:x,progress_bar:N,filter:B,skin:O,card:P,columns:T,min_column_width:D,items_per_row:S,font_family_title:I,font_family_description:F,font_size_title:z,font_size_description:G,font_color_title:L,font_color_description:A,background_color_title:j,background_color_description:V,background_color_ribbon:M,font_color_ribbon:q,background_color_icon:H,font_color_icon:R,background_color_button:W,font_color_button:Q,id:U,display_state:J,preview_show:K,filter_search:X,filter_taxonomies:Y,filter_price:Z,filter_price_min:$,filter_price_max:ee},className:te,setAttributes:oe}=e;if(""==U){const e="ld-cg-"+(Date.now().toString(36)+Math.random().toString(36).substr(2)).substr(0,"10");oe({id:e})}const re=LearnDash_Course_Grid_Block_Editor.post_types,le=LearnDash_Course_Grid_Block_Editor.paginations,ae=LearnDash_Course_Grid_Block_Editor.skins,ne=LearnDash_Course_Grid_Block_Editor.cards,ie=[],se={};for(const e in ae)if(Object.hasOwnProperty.call(ae,e)){const t={label:ae[e].label,value:ae[e].slug};ie.push(t),Object.hasOwnProperty.call(ae[e],"disable")&&(se[ae[e].slug]=ae[e].disable)}const ce=[],de=[],_e={},ue={};for(const e in ne)if(Object.hasOwnProperty.call(ne,e)&&(Object.hasOwnProperty.call(ne[e],"disable")&&(ue[ne[e]]=ne[e].disable),Object.hasOwnProperty.call(ne[e],"skins")&&ne[e].skins.forEach((function(t){_e[t]=_e[t]||[],_e[t].push(e)})),void 0!==ne[e].skins&&ne[e].skins.indexOf(O)>-1)){const t={label:ne[e].label,value:e};ce.push(t),de.push(e)}const me=LearnDash_Course_Grid_Block_Editor.image_sizes,he=LearnDash_Course_Grid_Block_Editor.orderby,pe=[{label:(0,o.__)("Ascending","learndash-course-grid"),value:"ASC"},{label:(0,o.__)("Descending","learndash-course-grid"),value:"DESC"}],ge=[{value:"",label:(0,o.__)("All","learndash-course-grid")},{value:"enrolled",label:(0,o.__)("Enrolled","learndash-course-grid")},{value:"not-enrolled",label:(0,o.__)("Not Enrolled","learndash-course-grid")}],be=[{value:"",label:(0,o.__)("All","learndash-course-grid")},{value:"completed",label:(0,o.__)("Completed","learndash-course-grid")},{value:"in_progress",label:(0,o.__)("In Progress","learndash-course-grid")},{value:"not_started",label:(0,o.__)("Not Started","learndash-course-grid")}];Ce(e);const fe=(0,t.createElement)(t.Fragment,{key:"learndash-course-grid-settings"},(0,t.createElement)(l.InspectorControls,{key:"controls"},(0,t.createElement)(a.Panel,{className:"learndash-course-grid-panel"},(0,t.createElement)(a.PanelBody,{title:(0,o.__)("Template","learndash-course-grid"),initialOpen:!0},(0,t.createElement)(a.BaseControl,{className:void 0===J.skin||J.skin?"show":"hide"},(0,t.createElement)(a.SelectControl,{label:(0,o.__)("Skin","learndash-course-grid"),options:ie,value:O||"",onChange:t=>{oe({skin:t}),Ce(e)}})),(0,t.createElement)(a.BaseControl,{className:void 0===J.card||J.card?"show":"hide"},(0,t.createElement)(a.SelectControl,{label:(0,o.__)("Card","learndash-course-grid"),options:ce,value:P||"",onChange:e=>{oe({card:e})}})),(0,t.createElement)(a.TextControl,{label:(0,o.__)("Columns"),value:T||"",type:"number",onChange:e=>oe({columns:e}),className:void 0===J.columns||J.columns?"show":"hide"}),["grid","masonry"].indexOf(O)>-1&&(0,t.createElement)(a.TextControl,{label:(0,o.__)("Min Column Width (in pixel)","learndash-course-grid"),value:D,type:"number",help:(0,o.__)("If column width reach value lower than this, the grid columns number will automatically be adjusted on display.","learndash-course-grid"),onChange:e=>oe({min_column_width:e}),className:void 0===J.min_column_width||J.min_column_width?"show":"hide"}),(0,t.createElement)(a.TextControl,{label:(0,o.__)("Items Per Row"),help:(0,o.__)("Number of items per row. Certain skins use this to customize the design."),value:S||"",type:"number",onChange:e=>oe({items_per_row:e}),className:void 0===J.items_per_row||J.items_per_row?"show":"hide"})),(0,t.createElement)(a.PanelBody,{title:(0,o.__)("Query","learndash-course-grid"),initialOpen:!1},(0,t.createElement)(a.BaseControl,{className:void 0===J.post_type||J.post_type?"show":"hide"},(0,t.createElement)(a.SelectControl,{label:(0,o.__)("Post Type","learndash-course-grid"),options:re,value:r||"",onChange:e=>oe({post_type:e})})),(0,t.createElement)(a.TextControl,{label:(0,o.__)("Posts per page"),help:(0,o.__)("Enter 0 show all items.","learndash-course-grid"),value:n||"",type:"number",onChange:e=>oe({per_page:e}),className:void 0===J.per_page||J.per_page?"show":"hide"}),(0,t.createElement)(a.BaseControl,{className:void 0===J.orderby||J.orderby?"show":"hide"},(0,t.createElement)(a.SelectControl,{label:(0,o.__)("Order By","learndash-course-grid"),options:he,value:s||"",onChange:e=>oe({orderby:e})})),(0,t.createElement)(a.BaseControl,{className:void 0===J.order||J.order?"show":"hide"},(0,t.createElement)(a.SelectControl,{label:(0,o.__)("Order","learndash-course-grid"),options:pe,value:d||"",onChange:e=>oe({order:e})})),(0,t.createElement)(a.TextControl,{label:(0,o.__)("Taxonomies","learndash-course-grid"),help:(0,o.__)("Format:","learndash-course-grid")+" taxonomy1:term1,term2; taxonomy2:term1,term2;",value:_||"",onChange:e=>oe({taxonomies:e}),className:void 0===J.taxonomies||J.taxonomies?"show taxonomies":"hide"}),["sfwd-courses","groups"].indexOf(r)>-1&&(0,t.createElement)(a.BaseControl,{className:void 0===J.enrollment_status||J.enrollment_status?"show":"hide"},(0,t.createElement)(a.SelectControl,{label:(0,o.__)("Enrollment Status","learndash-course-grid"),options:ge,value:u,onChange:e=>oe({enrollment_status:e})})),["sfwd-courses"].indexOf(r)>-1&&"enrolled"==u&&(0,t.createElement)(a.BaseControl,{className:void 0===J.progress_status||J.progress_status?"show":"hide"},(0,t.createElement)(a.SelectControl,{label:(0,o.__)("Progress Status","learndash-course-grid"),options:be,value:m,onChange:e=>oe({progress_status:e})}))),(0,t.createElement)(a.PanelBody,{title:(0,o.__)("Elements","learndash-course-grid"),initialOpen:!1},ne[P].elements.indexOf("thumbnail")>-1&&(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Thumbnail","learndash-course-grid"),checked:h,onChange:e=>oe({thumbnail:e}),className:void 0===J.thumbnail||J.thumbnail?"show":"hide"}),ne[P].elements.indexOf("thumbnail")>-1&&h&&(0,t.createElement)(a.BaseControl,{className:void 0===J.thumbnail_size||J.thumbnail_size?"show":"hide"},(0,t.createElement)(a.SelectControl,{label:(0,o.__)("Thumbnail Size","learndash-course-grid"),options:me,value:p||"",onChange:e=>oe({thumbnail_size:e})})),ne[P].elements.indexOf("ribbon")>-1&&(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Ribbon","learndash-course-grid"),checked:g,onChange:e=>oe({ribbon:e}),className:void 0===J.ribbon||J.ribbon?"show":"hide"}),ne[P].elements.indexOf("content")>-1&&(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Content","learndash-course-grid"),help:(0,o.__)("Content includes elements in the area outside of the thumbnail.","learndash-course-grid"),checked:b,onChange:e=>oe({content:e}),className:void 0===J.content||J.content?"show":"hide"}),ne[P].elements.indexOf("title")>-1&&(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Title","learndash-course-grid"),checked:f,onChange:e=>oe({title:e}),className:void 0===J.title||J.title?"show":"hide"}),ne[P].elements.indexOf("title")>-1&&f&&(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Clickable Title","learndash-course-grid"),checked:C,onChange:e=>oe({title_clickable:e}),className:void 0===J.title_clickable||J.title_clickable?"show":"hide"}),ne[P].elements.indexOf("description")>-1&&(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Description","learndash-course-grid"),checked:y,onChange:e=>oe({description:e}),className:void 0===J.description||J.description?"show":"hide"}),ne[P].elements.indexOf("description")>-1&&y&&(0,t.createElement)(a.TextControl,{label:(0,o.__)("Max Description Character Count"),value:E||"",type:"number",onChange:e=>{oe({description_char_max:e})}}),ne[P].elements.indexOf("post_meta")>-1&&(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Meta","learndash-course-grid"),checked:v,onChange:e=>oe({post_meta:e}),className:void 0===J.post_meta||J.post_meta?"show":"hide"}),ne[P].elements.indexOf("button")>-1&&(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Button","learndash-course-grid"),checked:w,onChange:e=>oe({button:e}),className:void 0===J.button||J.button?"show":"hide"}),(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Progress Bar","learndash-course-grid"),help:(0,o.__)("Available for LearnDash course and group.","learndash-course-grid"),checked:N,onChange:e=>oe({progress_bar:e}),className:void 0===J.progress_bar||J.progress_bar?"show":"hide"}),(0,t.createElement)(a.BaseControl,{className:void 0===J.pagination||J.pagination?"show":"hide"},(0,t.createElement)(a.SelectControl,{label:(0,o.__)("Pagination","learndash-course-grid"),options:le,value:k||"",onChange:e=>oe({pagination:e})})),(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Filter","learndash-course-grid"),checked:B,onChange:e=>{oe({filter:e})},className:void 0===J.filter||J.filter?"show":"hide"})),B&&(0,t.createElement)(c,{context:"page",course_grid_id:U,search:X,taxonomies:Y,price:Z,price_min:$,price_max:ee,setAttributes:oe}),(0,t.createElement)(a.PanelBody,{title:(0,o.__)("Styles","learndash-course-grid"),initialOpen:!1},"grid"==O&&(0,t.createElement)("div",{className:"grid-style"},(0,t.createElement)("h3",null,(0,o.__)("Grid","learndash-course-grid")),(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Equal Grid Height","learndash-course-grid"),checked:x,onChange:e=>oe({grid_height_equal:e}),className:void 0===J.grid_height_equal||J.grid_height_equal?"show":"hide"})),ne[P].elements.indexOf("title")>-1&&f&&(0,t.createElement)(t.Fragment,{key:"title-styles"},(0,t.createElement)("h3",null,(0,o.__)("Heading","learndash-course-grid")),(0,t.createElement)(a.TextControl,{label:(0,o.__)("Heading Font Family"),value:I||"",onChange:e=>oe({font_family_title:e}),className:void 0===J.font_family_title||J.font_family_title?"show":"hide"}),(0,t.createElement)(a.TextControl,{label:(0,o.__)("Heading Font Size"),help:(0,o.__)("Accepts full format, e.g. 18px, 2rem"),value:z||"",onChange:e=>oe({font_size_title:e}),className:void 0===J.font_size_title||J.font_size_title?"show":"hide"}),(0,t.createElement)(a.BaseControl,{className:void 0===J.font_color_title||J.font_color_title?"show color-picker":"hide color-picker",label:(0,o.__)("Heading Font Color")},(0,t.createElement)("div",{className:"color-wrapper"},(0,t.createElement)(a.ColorIndicator,{colorValue:L||""}),(0,t.createElement)(a.ColorPalette,{value:L||"",onChange:e=>{oe({font_color_title:e})},clearable:!0}))),(0,t.createElement)(a.BaseControl,{className:void 0===J.background_color_title||J.background_color_title?"show color-picker":"hide color-picker",label:(0,o.__)("Heading Background Color")},(0,t.createElement)("div",{className:"color-wrapper"},(0,t.createElement)(a.ColorIndicator,{colorValue:j||""}),(0,t.createElement)(a.ColorPalette,{value:j||"",onChange:e=>{oe({background_color_title:e})},clearable:!0})))),ne[P].elements.indexOf("description")>-1&&y&&(0,t.createElement)(t.Fragment,{key:"description-styles"},(0,t.createElement)("h3",null,(0,o.__)("Description","learndash-course-grid")),(0,t.createElement)(a.TextControl,{label:(0,o.__)("Description Font Family"),value:F||"",onChange:e=>oe({font_family_description:e}),className:void 0===J.font_family_description||J.font_family_description?"show":"hide"}),(0,t.createElement)(a.TextControl,{label:(0,o.__)("Description Font Size"),help:(0,o.__)("Accepts full format, e.g. 18px, 2rem"),value:G||"",onChange:e=>oe({font_size_description:e}),className:void 0===J.font_size_description||J.font_size_description?"show":"hide"}),(0,t.createElement)(a.BaseControl,{className:void 0===J.font_color_description||J.font_color_description?"show color-picker":"hide color-picker",label:(0,o.__)("Description Font Color")},(0,t.createElement)("div",{className:"color-wrapper"},(0,t.createElement)(a.ColorIndicator,{colorValue:A||""}),(0,t.createElement)(a.ColorPalette,{value:A||"",onChange:e=>{oe({font_color_description:e})},clearable:!0}))),(0,t.createElement)(a.BaseControl,{className:void 0===J.background_color_description||J.background_color_description?"show color-picker":"hide color-picker",label:(0,o.__)("Description Background Color")},(0,t.createElement)("div",{className:"color-wrapper"},(0,t.createElement)(a.ColorIndicator,{colorValue:V||""}),(0,t.createElement)(a.ColorPalette,{value:V||"",onChange:e=>{oe({background_color_description:e})},clearable:!0})))),(0,t.createElement)("h3",null,(0,o.__)("Elements","learndash-course-grid")),ne[P].elements.indexOf("ribbon")>-1&&g&&(0,t.createElement)(t.Fragment,{key:"ribbon-styles"},(0,t.createElement)(a.BaseControl,{className:void 0===J.font_color_ribbon||J.font_color_ribbon?"show color-picker":"hide color-picker",label:(0,o.__)("Ribbon Font Color")},(0,t.createElement)("div",{className:"color-wrapper"},(0,t.createElement)(a.ColorIndicator,{colorValue:q||""}),(0,t.createElement)(a.ColorPalette,{value:q||"",onChange:e=>{oe({font_color_ribbon:e})},clearable:!0}))),(0,t.createElement)(a.BaseControl,{className:void 0===J.background_color_ribbon||J.background_color_ribbon?"show color-picker":"hide color-picker",label:(0,o.__)("Ribbon Background Color")},(0,t.createElement)("div",{className:"color-wrapper"},(0,t.createElement)(a.ColorIndicator,{colorValue:M||""}),(0,t.createElement)(a.ColorPalette,{value:M||"",onChange:e=>{oe({background_color_ribbon:e})},clearable:!0})))),ne[P].elements.indexOf("icon")>-1&&(0,t.createElement)(t.Fragment,{key:"icon-styles"},(0,t.createElement)(a.BaseControl,{className:void 0===J.font_color_icon||J.font_color_icon?"show color-picker":"hide color-picker",label:(0,o.__)("Icon Color")},(0,t.createElement)("div",{className:"color-wrapper"},(0,t.createElement)(a.ColorIndicator,{colorValue:R||""}),(0,t.createElement)(a.ColorPalette,{value:R||"",onChange:e=>{oe({font_color_icon:e})},clearable:!0}))),(0,t.createElement)(a.BaseControl,{className:void 0===J.background_color_icon||J.background_color_icon?"show color-picker":"hide color-picker",label:(0,o.__)("Icon Background Color")},(0,t.createElement)("div",{className:"color-wrapper"},(0,t.createElement)(a.ColorIndicator,{colorValue:H||""}),(0,t.createElement)(a.ColorPalette,{value:H||"",onChange:e=>{oe({background_color_icon:e})},clearable:!0})))),ne[P].elements.indexOf("button")>-1&&w&&(0,t.createElement)(t.Fragment,{key:"button-styles"},(0,t.createElement)(a.BaseControl,{className:void 0===J.font_color_button||J.font_color_button?"show color-picker":"hide color-picker",label:(0,o.__)("Button Font Color")},(0,t.createElement)("div",{className:"color-wrapper"},(0,t.createElement)(a.ColorIndicator,{colorValue:Q||""}),(0,t.createElement)(a.ColorPalette,{value:Q||"",onChange:e=>{oe({font_color_button:e})},clearable:!0}))),(0,t.createElement)(a.BaseControl,{className:void 0===J.background_color_button||J.background_color_button?"show color-picker":"hide color-picker",label:(0,o.__)("Button Background Color")},(0,t.createElement)("div",{className:"color-wrapper"},(0,t.createElement)(a.ColorIndicator,{colorValue:W||""}),(0,t.createElement)(a.ColorPalette,{value:W||"",onChange:e=>{oe({background_color_button:e})},clearable:!0}))))),(0,t.createElement)(a.PanelBody,{title:(0,o.__)("Preview","learndash-course-grid"),initialOpen:!1},(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Show Preview","learndash-course-grid"),checked:!!K,onChange:e=>oe({preview_show:e})})))),(0,t.createElement)(l.InspectorAdvancedControls,null,(0,t.createElement)(a.TextControl,{label:(0,o.__)("ID"),help:(0,o.__)("Unique ID for CSS styling purpose."),value:U||"",onChange:e=>oe({id:e}),className:void 0===J.id||J.id?"show":"hide"})));function Ce(e){const{attributes:t={skin:O,card:P,display_state:J},setAttributes:o}=e;let r=[];if(void 0!==se[O]&&(r=se[O]),LearnDash_Course_Grid_Block_Editor.editor_fields.forEach((e=>{let t=J;t[e]=!0,o({display_state:t})})),r.forEach((e=>{let t=J;t[e]=!1,o({display_state:t})})),-1==de.indexOf(P)&&Object.prototype.hasOwnProperty.call(_e,"skin")&&Object.prototype.hasOwnProperty.call(_e[O],0)){let e=P;e=_e[O][0],o({card:e})}}return[fe,(ye=e.attributes,1==ye.preview_show?(0,t.createElement)(i(),{block:"learndash/ld-course-grid",attributes:ye,key:"learndash/ld-course-grid"}):(0,o.__)("[learndash_course_grid] shortcode output shown here","learndash-course-grid"))];var ye},save:e=>{}}),(0,r.registerBlockType)("learndash/ld-course-grid-filter",{title:(0,o.__)("LearnDash Course Grid Filter","learndash-course-grid"),description:(0,o.__)("LearnDash course grid filter widget.","learndash-course-grid"),icon:"filter",category:"learndash-blocks",supports:{customClassName:!1},attributes:{course_grid_id:{type:"string",default:""},search:{type:"boolean",default:1},taxonomies:{type:"array",default:["category","post_tag"]},price:{type:"boolean",default:1},price_min:{type:"string",default:0},price_max:{type:"string",default:1e3},preview_show:{type:"boolean",default:1}},edit:e=>{const{attributes:{course_grid_id:r,search:n,taxonomies:s,price:d,price_min:_,price_max:u,preview_show:m},setAttributes:h}=e,p=(LearnDash_Course_Grid_Block_Editor.taxonomies,(0,t.createElement)(t.Fragment,{key:"learndash-course-grid-filter-settings"},(0,t.createElement)(l.InspectorControls,{key:"controls"},(0,t.createElement)(a.Panel,{className:"learndash-course-grid-filter-panel"},(0,t.createElement)(c,{context:"widget",course_grid_id:r,search:n,taxonomies:s,price:d,price_min:_,price_max:u,setAttributes:h}),(0,t.createElement)(a.PanelBody,{title:(0,o.__)("Preview","learndash-course-grid"),initialOpen:!1},(0,t.createElement)(a.ToggleControl,{label:(0,o.__)("Show Preview","learndash-course-grid"),checked:!!m,onChange:e=>h({preview_show:e})}))))));return[p,(g=e.attributes,1==g.preview_show?(0,t.createElement)(i(),{block:"learndash/ld-course-grid-filter",attributes:g,key:"learndash/ld-course-grid-filter"}):(0,o.__)("[learndash_course_grid_filter] shortcode output shown here","learndash-course-grid"))];var g},save:e=>{}})}();