﻿/*
<<<<<<< HEAD
 Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
(function(){function t(){return!1}function x(a,b){var c,d=[];a.filterChildren(b);for(c=a.children.length-1;0<=c;c--)d.unshift(a.children[c]),a.children[c].remove();c=a.attributes;var e=a,h=!0,g;for(g in c)if(h)h=!1;else{var m=new CKEDITOR.htmlParser.element(a.name);m.attributes[g]=c[g];e.add(m);e=m;delete c[g]}for(c=0;c<d.length;c++)e.add(d[c])}var f,k,u,r,l=CKEDITOR.tools,y=["o:p","xml","script","meta","link"],w={},v=0;CKEDITOR.plugins.pastefromword={};CKEDITOR.cleanWord=function(a,b){var c=Boolean(a.match(/mso-list:\s*l\d+\s+level\d+\s+lfo\d+/));
a=a.replace(/<!\[/g,"\x3c!--[").replace(/\]>/g,"]--\x3e");var d=CKEDITOR.htmlParser.fragment.fromHtml(a);r=new CKEDITOR.htmlParser.filter({root:function(a){a.filterChildren(r);CKEDITOR.plugins.pastefromword.lists.cleanup(f.createLists(a))},elementNames:[[/^\?xml:namespace$/,""],[/^v:shapetype/,""],[new RegExp(y.join("|")),""]],elements:{a:function(a){if(a.attributes.name){if("_GoBack"==a.attributes.name){delete a.name;return}if(a.attributes.name.match(/^OLE_LINK\d+$/)){delete a.name;return}}if(a.attributes.href&&
a.attributes.href.match(/#.+$/)){var b=a.attributes.href.match(/#(.+)$/)[1];w[b]=a}a.attributes.name&&w[a.attributes.name]&&(a=w[a.attributes.name],a.attributes.href=a.attributes.href.replace(/.*#(.*)$/,"#$1"))},div:function(a){k.createStyleStack(a,r,b)},img:function(a){if(a.parent){var b=a.parent.attributes;(b=b.style||b.STYLE)&&b.match(/mso\-list:\s?Ignore/)&&(a.attributes["cke-ignored"]=!0)}k.mapStyles(a,{width:function(b){k.setStyle(a,"width",b+"px")},height:function(b){k.setStyle(a,"height",
b+"px")}});a.attributes.src&&a.attributes.src.match(/^file:\/\//)&&a.attributes.alt&&a.attributes.alt.match(/^https?:\/\//)&&(a.attributes.src=a.attributes.alt)},p:function(a){a.filterChildren(r);if(a.attributes.style&&a.attributes.style.match(/display:\s*none/i))return!1;if(f.thisIsAListItem(b,a))f.convertToFakeListItem(b,a);else{var c=a.getAscendant(function(a){return"ul"==a.name||"ol"==a.name}),d=l.parseCssText(a.attributes.style);c&&!c.attributes["cke-list-level"]&&d["mso-list"]&&d["mso-list"].match(/level/)&&
(c.attributes["cke-list-level"]=d["mso-list"].match(/level(\d+)/)[1])}k.createStyleStack(a,r,b)},pre:function(a){f.thisIsAListItem(b,a)&&f.convertToFakeListItem(b,a);k.createStyleStack(a,r,b)},h1:function(a){f.thisIsAListItem(b,a)&&f.convertToFakeListItem(b,a);k.createStyleStack(a,r,b)},font:function(a){if(a.getHtml().match(/^\s*$/))return(new CKEDITOR.htmlParser.text(" ")).insertAfter(a),!1;b&&!0===b.config.pasteFromWordRemoveFontStyles&&a.attributes.size&&delete a.attributes.size;x(a,r)},ul:function(a){if(c)return"li"==
a.parent.name&&0===l.indexOf(a.parent.children,a)&&k.setStyle(a.parent,"list-style-type","none"),f.dissolveList(a),!1},li:function(a){c&&(a.attributes.style=k.normalizedStyles(a,b),k.pushStylesLower(a))},ol:function(a){if(c)return"li"==a.parent.name&&0===l.indexOf(a.parent.children,a)&&k.setStyle(a.parent,"list-style-type","none"),f.dissolveList(a),!1},span:function(a){a.filterChildren(r);a.attributes.style=k.normalizedStyles(a,b);if(!a.attributes.style||a.attributes.style.match(/^mso\-bookmark:OLE_LINK\d+$/)||
a.getHtml().match(/^(\s|&nbsp;)+$/)){for(var c=a.children.length-1;0<=c;c--)a.children[c].insertAfter(a);return!1}k.createStyleStack(a,r,b)},table:function(a){a._tdBorders={};a.filterChildren(r);var b,c=0,d;for(d in a._tdBorders)a._tdBorders[d]>c&&(c=a._tdBorders[d],b=d);k.setStyle(a,"border",b)},td:function(a){var b=a.getAscendant("table"),c=b._tdBorders,d=["border","border-top","border-right","border-bottom","border-left"],b=l.parseCssText(b.attributes.style),e=b.background||b.BACKGROUND;e&&k.setStyle(a,
"background",e,!0);(b=b["background-color"]||b["BACKGROUND-COLOR"])&&k.setStyle(a,"background-color",b,!0);var b=l.parseCssText(a.attributes.style),p;for(p in b)e=b[p],delete b[p],b[p.toLowerCase()]=e;for(p=0;p<d.length;p++)b[d[p]]&&(e=b[d[p]],c[e]=c[e]?c[e]+1:1);k.pushStylesLower(a,{background:!0})},"v:imagedata":t,"v:shape":function(a){var b=!1;a.parent.getFirst(function(c){"img"==c.name&&c.attributes&&c.attributes["v:shapes"]==a.attributes.id&&(b=!0)});if(b)return!1;var c="";a.forEach(function(a){a.attributes&&
a.attributes.src&&(c=a.attributes.src)},CKEDITOR.NODE_ELEMENT,!0);a.filterChildren(r);a.name="img";a.attributes.src=a.attributes.src||c;delete a.attributes.type},style:function(){return!1}},attributes:{style:function(a,c){return k.normalizedStyles(c,b)||!1},"class":function(a){a=a.replace(/msonormal|msolistparagraph\w*/ig,"");return""===a?!1:a},cellspacing:t,cellpadding:t,border:t,valign:t,"v:shapes":t,"o:spid":t},comment:function(a){a.match(/\[if.* supportFields.*\]/)&&v++;"[endif]"==a&&(v=0<v?v-
1:0);return!1},text:function(a){return v?"":a.replace(/&nbsp;/g," ")}});var e=new CKEDITOR.htmlParser.basicWriter;r.applyTo(d);d.writeHtml(e);return e.getHtml()};CKEDITOR.plugins.pastefromword.styles={setStyle:function(a,b,c,d){var e=l.parseCssText(a.attributes.style);d&&e[b]||(""===c?delete e[b]:e[b]=c,a.attributes.style=CKEDITOR.tools.writeCssText(e))},mapStyles:function(a,b){for(var c in b)if(a.attributes[c]){if("function"===typeof b[c])b[c](a.attributes[c]);else k.setStyle(a,b[c],a.attributes[c]);
delete a.attributes[c]}},normalizedStyles:function(a,b){var c="background-color:transparent border-image:none color:windowtext direction:ltr mso- text-indent visibility:visible div:border:none".split(" "),d="font-family font font-size color background-color line-height text-decoration".split(" "),e=function(){for(var a=[],b=0;b<arguments.length;b++)arguments[b]&&a.push(arguments[b]);return-1!==l.indexOf(c,a.join(":"))},h=b&&!0===b.config.pasteFromWordRemoveFontStyles,g=l.parseCssText(a.attributes.style);
"cke:li"==a.name&&g["TEXT-INDENT"]&&g.MARGIN&&(a.attributes["cke-indentation"]=f.getElementIndentation(a),g.MARGIN=g.MARGIN.replace(/(([\w\.]+ ){3,3})[\d\.]+(\w+$)/,"$10$3"));for(var m=l.objectKeys(g),q=0;q<m.length;q++){var n=m[q].toLowerCase(),p=g[m[q]],k=CKEDITOR.tools.indexOf;(h&&-1!==k(d,n.toLowerCase())||e(null,n,p)||e(null,n.replace(/\-.*$/,"-"))||e(null,n)||e(a.name,n,p)||e(a.name,n.replace(/\-.*$/,"-"))||e(a.name,n)||e(p))&&delete g[m[q]]}return CKEDITOR.tools.writeCssText(g)},createStyleStack:function(a,
b,c){var d=[];a.filterChildren(b);for(b=a.children.length-1;0<=b;b--)d.unshift(a.children[b]),a.children[b].remove();k.sortStyles(a);b=l.parseCssText(k.normalizedStyles(a,c));c=a;var e="span"===a.name,h;for(h in b)if(!h.match(/margin|text\-align|width|border|padding/i))if(e)e=!1;else{var g=new CKEDITOR.htmlParser.element("span");g.attributes.style=h+":"+b[h];c.add(g);c=g;delete b[h]}"{}"!==JSON.stringify(b)?a.attributes.style=CKEDITOR.tools.writeCssText(b):delete a.attributes.style;for(b=0;b<d.length;b++)c.add(d[b])},
sortStyles:function(a){for(var b=["border","border-bottom","font-size","background"],c=l.parseCssText(a.attributes.style),d=l.objectKeys(c),e=[],h=[],g=0;g<d.length;g++)-1!==l.indexOf(b,d[g].toLowerCase())?e.push(d[g]):h.push(d[g]);e.sort(function(a,c){var d=l.indexOf(b,a.toLowerCase()),e=l.indexOf(b,c.toLowerCase());return d-e});d=[].concat(e,h);e={};for(g=0;g<d.length;g++)e[d[g]]=c[d[g]];a.attributes.style=CKEDITOR.tools.writeCssText(e)},pushStylesLower:function(a,b){if(!a.attributes.style||0===
a.children.length)return!1;b=b||{};var c={"list-style-type":!0,width:!0,border:!0,"border-":!0},d=l.parseCssText(a.attributes.style),e;for(e in d)if(!(e.toLowerCase()in c||c[e.toLowerCase().replace(/\-.*$/,"-")]||e.toLowerCase()in b)){for(var h=!1,g=0;g<a.children.length;g++){var m=a.children[g];m.type===CKEDITOR.NODE_ELEMENT&&(h=!0,k.setStyle(m,e,d[e]))}h&&delete d[e]}a.attributes.style=CKEDITOR.tools.writeCssText(d);return!0}};k=CKEDITOR.plugins.pastefromword.styles;CKEDITOR.plugins.pastefromword.lists=
{thisIsAListItem:function(a,b){return u.isEdgeListItem(a,b)||b.attributes.style&&b.attributes.style.match(/mso\-list:\s?l\d/)&&"li"!==b.parent.name||b.attributes["cke-dissolved"]||b.getHtml().match(/<!\-\-\[if !supportLists]\-\->/)||b.getHtml().match(/^( )*.*?[\.\)] ( ){2,700}/)?!0:!1},convertToFakeListItem:function(a,b){u.isEdgeListItem(a,b)&&u.assignListLevels(a,b);this.getListItemInfo(b);if(!b.attributes["cke-dissolved"]){var c;b.forEach(function(a){!c&&"img"==a.name&&a.attributes["cke-ignored"]&&
"*"==a.attributes.alt&&(c="·",a.remove())},CKEDITOR.NODE_ELEMENT);b.forEach(function(a){c||a.value.match(/^ /)||(c=a.value)},CKEDITOR.NODE_TEXT);if("undefined"==typeof c)return;b.attributes["cke-symbol"]=c.replace(/ .*$/,"");f.removeSymbolText(b)}if(b.attributes.style){var d=l.parseCssText(b.attributes.style);d["margin-left"]&&(delete d["margin-left"],b.attributes.style=CKEDITOR.tools.writeCssText(d))}b.name="cke:li"},convertToRealListItems:function(a){var b=[];a.forEach(function(a){"cke:li"==a.name&&
(a.name="li",b.push(a))},CKEDITOR.NODE_ELEMENT,!1);return b},removeSymbolText:function(a){var b,c=a.attributes["cke-symbol"];a.forEach(function(d){!b&&d.value.match(c.replace(")","\\)").replace("(",""))&&(d.value=d.value.replace(c,""),d.parent.getHtml().match(/^(\s|&nbsp;)*$/)&&(b=d.parent!==a?d.parent:null))},CKEDITOR.NODE_TEXT);b&&b.remove()},setListSymbol:function(a,b,c){c=c||1;var d=l.parseCssText(a.attributes.style);if("ol"==a.name){if(a.attributes.type||d["list-style-type"])return;var e={"[ivx]":"lower-roman",
"[IVX]":"upper-roman","[a-z]":"lower-alpha","[A-Z]":"upper-alpha","\\d":"decimal"},h;for(h in e)if(f.getSubsectionSymbol(b).match(new RegExp(h))){d["list-style-type"]=e[h];break}a.attributes["cke-list-style-type"]=d["list-style-type"]}else e={"·":"disc",o:"circle","§":"square"},!d["list-style-type"]&&e[b]&&(d["list-style-type"]=e[b]);f.setListSymbol.removeRedundancies(d,c);(a.attributes.style=CKEDITOR.tools.writeCssText(d))||delete a.attributes.style},setListStart:function(a){for(var b=[],c=0,d=0;d<
a.children.length;d++)b.push(a.children[d].attributes["cke-symbol"]||"");b[0]||c++;switch(a.attributes["cke-list-style-type"]){case "lower-roman":case "upper-roman":a.attributes.start=f.toArabic(f.getSubsectionSymbol(b[c]))-c;break;case "lower-alpha":case "upper-alpha":a.attributes.start=f.getSubsectionSymbol(b[c]).replace(/\W/g,"").toLowerCase().charCodeAt(0)-96-c;break;case "decimal":a.attributes.start=parseInt(f.getSubsectionSymbol(b[c]),10)-c||1}"1"==a.attributes.start&&delete a.attributes.start;
delete a.attributes["cke-list-style-type"]},numbering:{toNumber:function(a,b){function c(a){a=a.toUpperCase();for(var b=1,c=1;0<a.length;c*=26)b+="ABCDEFGHIJKLMNOPQRSTUVWXYZ".indexOf(a.charAt(a.length-1))*c,a=a.substr(0,a.length-1);return b}function d(a){var b=[[1E3,"M"],[900,"CM"],[500,"D"],[400,"CD"],[100,"C"],[90,"XC"],[50,"L"],[40,"XL"],[10,"X"],[9,"IX"],[5,"V"],[4,"IV"],[1,"I"]];a=a.toUpperCase();for(var c=b.length,d=0,f=0;f<c;++f)for(var n=b[f],p=n[1].length;a.substr(0,p)==n[1];a=a.substr(p))d+=
n[0];return d}return"decimal"==b?Number(a):"upper-roman"==b||"lower-roman"==b?d(a.toUpperCase()):"lower-alpha"==b||"upper-alpha"==b?c(a):1},getStyle:function(a){a=a.slice(0,1);var b={i:"lower-roman",v:"lower-roman",x:"lower-roman",l:"lower-roman",m:"lower-roman",I:"upper-roman",V:"upper-roman",X:"upper-roman",L:"upper-roman",M:"upper-roman"}[a];b||(b="decimal",a.match(/[a-z]/)&&(b="lower-alpha"),a.match(/[A-Z]/)&&(b="upper-alpha"));return b}},getSubsectionSymbol:function(a){return(a.match(/([\da-zA-Z]+).?$/)||
["placeholder",1])[1]},setListDir:function(a){var b=0,c=0;a.forEach(function(a){"li"==a.name&&("rtl"==(a.attributes.dir||a.attributes.DIR||"").toLowerCase()?c++:b++)},CKEDITOR.ELEMENT_NODE);c>b&&(a.attributes.dir="rtl")},createList:function(a){return(a.attributes["cke-symbol"].match(/([\da-np-zA-NP-Z]).?/)||[])[1]?new CKEDITOR.htmlParser.element("ol"):new CKEDITOR.htmlParser.element("ul")},createLists:function(a){var b,c,d,e=f.convertToRealListItems(a);if(0===e.length)return[];var h=f.groupLists(e);
for(a=0;a<h.length;a++){var g=h[a],m=g[0];for(d=0;d<g.length;d++)if(1==g[d].attributes["cke-list-level"]){m=g[d];break}var m=[f.createList(m)],k=m[0],n=[m[0]];k.insertBefore(g[0]);for(d=0;d<g.length;d++){b=g[d];for(c=b.attributes["cke-list-level"];c>m.length;){var p=f.createList(b),l=k.children;0<l.length?l[l.length-1].add(p):(l=new CKEDITOR.htmlParser.element("li",{style:"list-style-type:none"}),l.add(p),k.add(l));m.push(p);n.push(p);k=p;c==m.length&&f.setListSymbol(p,b.attributes["cke-symbol"],
c)}for(;c<m.length;)m.pop(),k=m[m.length-1],c==m.length&&f.setListSymbol(k,b.attributes["cke-symbol"],c);b.remove();k.add(b)}m[0].children.length&&(d=m[0].children[0].attributes["cke-symbol"],!d&&1<m[0].children.length&&(d=m[0].children[1].attributes["cke-symbol"]),d&&f.setListSymbol(m[0],d));for(d=0;d<n.length;d++)f.setListStart(n[d]);for(d=0;d<g.length;d++)this.determineListItemValue(g[d])}return e},cleanup:function(a){var b=["cke-list-level","cke-symbol","cke-list-id","cke-indentation","cke-dissolved"],
c,d;for(c=0;c<a.length;c++)for(d=0;d<b.length;d++)delete a[c].attributes[b[d]]},determineListItemValue:function(a){if("ol"===a.parent.name){var b=this.calculateValue(a),c=a.attributes["cke-symbol"].match(/[a-z0-9]+/gi),d;c&&(c=c[c.length-1],d=a.parent.attributes["cke-list-style-type"]||this.numbering.getStyle(c),c=this.numbering.toNumber(c,d),c!==b&&(a.attributes.value=c))}},calculateValue:function(a){if(!a.parent)return 1;var b=a.parent;a=a.getIndex();var c=null,d,e,h;for(h=a;0<=h&&null===c;h--)e=
b.children[h],e.attributes&&void 0!==e.attributes.value&&(d=h,c=parseInt(e.attributes.value,10));null===c&&(c=void 0!==b.attributes.start?parseInt(b.attributes.start,10):1,d=0);return c+(a-d)},dissolveList:function(a){function b(a){return 50<=a?"l"+b(a-50):40<=a?"xl"+b(a-40):10<=a?"x"+b(a-10):9==a?"ix":5<=a?"v"+b(a-5):4==a?"iv":1<=a?"i"+b(a-1):""}function c(a,b){function c(b,d){return b&&b.parent?a(b.parent)?c(b.parent,d+1):c(b.parent,d):d}return c(b,0)}var d=function(a){return function(b){return b.name==
a}},e=function(a){return d("ul")(a)||d("ol")(a)},h=CKEDITOR.tools.array,g=[],f,q;a.forEach(function(a){g.push(a)},CKEDITOR.NODE_ELEMENT,!1);f=h.filter(g,d("li"));var n=h.filter(g,e);h.forEach(n,function(a){var g=a.attributes.type,f=parseInt(a.attributes.start,10)||1,k=c(e,a)+1;g||(g=l.parseCssText(a.attributes.style)["list-style-type"]);h.forEach(h.filter(a.children,d("li")),function(c,d){var e;switch(g){case "disc":e="·";break;case "circle":e="o";break;case "square":e="§";break;case "1":case "decimal":e=
f+d+".";break;case "a":case "lower-alpha":e=String.fromCharCode(97+f-1+d)+".";break;case "A":case "upper-alpha":e=String.fromCharCode(65+f-1+d)+".";break;case "i":case "lower-roman":e=b(f+d)+".";break;case "I":case "upper-roman":e=b(f+d).toUpperCase()+".";break;default:e="ul"==a.name?"·":f+d+"."}c.attributes["cke-symbol"]=e;c.attributes["cke-list-level"]=k})});f=h.reduce(f,function(a,b){var c=b.children[0];if(c&&c.name&&c.attributes.style&&c.attributes.style.match(/mso-list:/i)){k.pushStylesLower(b,
{"list-style-type":!0,display:!0});var d=l.parseCssText(c.attributes.style,!0);k.setStyle(b,"mso-list",d["mso-list"],!0);k.setStyle(c,"mso-list","");delete b["cke-list-level"];(c=d.display?"display":d.DISPLAY?"DISPLAY":"")&&k.setStyle(b,"display",d[c],!0)}if(1===b.children.length&&e(b.children[0]))return a;b.name="p";b.attributes["cke-dissolved"]=!0;a.push(b);return a},[]);for(q=f.length-1;0<=q;q--)f[q].insertAfter(a);for(q=n.length-1;0<=q;q--)delete n[q].name},groupLists:function(a){var b,c,d=[[a[0]]],
e=d[0];c=a[0];c.attributes["cke-indentation"]=c.attributes["cke-indentation"]||f.getElementIndentation(c);for(b=1;b<a.length;b++){c=a[b];var h=a[b-1];c.attributes["cke-indentation"]=c.attributes["cke-indentation"]||f.getElementIndentation(c);c.previous!==h&&(f.chopDiscontinuousLists(e,d),d.push(e=[]));e.push(c)}f.chopDiscontinuousLists(e,d);return d},chopDiscontinuousLists:function(a,b){for(var c={},d=[[]],e,h=0;h<a.length;h++){var g=c[a[h].attributes["cke-list-level"]],k=this.getListItemInfo(a[h]),
q,n;g?(n=g.type.match(/alpha/)&&7==g.index?"alpha":n,n="o"==a[h].attributes["cke-symbol"]&&14==g.index?"alpha":n,q=f.getSymbolInfo(a[h].attributes["cke-symbol"],n),k=this.getListItemInfo(a[h]),(g.type!=q.type||e&&k.id!=e.id&&!this.isAListContinuation(a[h]))&&d.push([])):q=f.getSymbolInfo(a[h].attributes["cke-symbol"]);for(e=parseInt(a[h].attributes["cke-list-level"],10)+1;20>e;e++)c[e]&&delete c[e];c[a[h].attributes["cke-list-level"]]=q;d[d.length-1].push(a[h]);e=k}[].splice.apply(b,[].concat([l.indexOf(b,
a),1],d))},isAListContinuation:function(a){var b=a;do if((b=b.previous)&&b.type===CKEDITOR.NODE_ELEMENT){if(void 0===b.attributes["cke-list-level"])break;if(b.attributes["cke-list-level"]===a.attributes["cke-list-level"])return b.attributes["cke-list-id"]===a.attributes["cke-list-id"]}while(b);return!1},getElementIndentation:function(a){a=l.parseCssText(a.attributes.style);if(a.margin||a.MARGIN){a.margin=a.margin||a.MARGIN;var b={styles:{margin:a.margin}};CKEDITOR.filter.transformationsTools.splitMarginShorthand(b);
a["margin-left"]=b.styles["margin-left"]}return parseInt(l.convertToPx(a["margin-left"]||"0px"),10)},toArabic:function(a){return a.match(/[ivxl]/i)?a.match(/^l/i)?50+f.toArabic(a.slice(1)):a.match(/^lx/i)?40+f.toArabic(a.slice(1)):a.match(/^x/i)?10+f.toArabic(a.slice(1)):a.match(/^ix/i)?9+f.toArabic(a.slice(2)):a.match(/^v/i)?5+f.toArabic(a.slice(1)):a.match(/^iv/i)?4+f.toArabic(a.slice(2)):a.match(/^i/i)?1+f.toArabic(a.slice(1)):f.toArabic(a.slice(1)):0},getSymbolInfo:function(a,b){var c=a.toUpperCase()==
a?"upper-":"lower-",d={"·":["disc",-1],o:["circle",-2],"§":["square",-3]};if(a in d||b&&b.match(/(disc|circle|square)/))return{index:d[a][1],type:d[a][0]};if(a.match(/\d/))return{index:a?parseInt(f.getSubsectionSymbol(a),10):0,type:"decimal"};a=a.replace(/\W/g,"").toLowerCase();return!b&&a.match(/[ivxl]+/i)||b&&"alpha"!=b||"roman"==b?{index:f.toArabic(a),type:c+"roman"}:a.match(/[a-z]/i)?{index:a.charCodeAt(0)-97,type:c+"alpha"}:{index:-1,type:"disc"}},getListItemInfo:function(a){if(void 0!==a.attributes["cke-list-id"])return{id:a.attributes["cke-list-id"],
level:a.attributes["cke-list-level"]};var b=l.parseCssText(a.attributes.style)["mso-list"],c={id:"0",level:"1"};b&&(b+=" ",c.level=b.match(/level(.+?)\s+/)[1],c.id=b.match(/l(\d+?)\s+/)[1]);a.attributes["cke-list-level"]=void 0!==a.attributes["cke-list-level"]?a.attributes["cke-list-level"]:c.level;a.attributes["cke-list-id"]=c.id;return c}};f=CKEDITOR.plugins.pastefromword.lists;CKEDITOR.plugins.pastefromword.heuristics={isEdgeListItem:function(a,b){return CKEDITOR.env.edge&&a.config.pasteFromWord_heuristicsEdgeList?
b.attributes.style&&!b.attributes.style.match(/mso\-list/)&&!!b.find(function(a){var b=l.parseCssText(a.attributes&&a.attributes.style);if(!b)return!1;var e=b["font-family"]||"";return(b.font||b["font-size"]||"").match(/7pt/i)&&!!a.previous||e.match(/symbol/i)},!0).length:!1},assignListLevels:function(a,b){if(!b.attributes||void 0===b.attributes["cke-list-level"]){for(var c=[f.getElementIndentation(b)],d=[b],e=[],h=CKEDITOR.tools.array,g=h.map;b.next&&b.next.attributes&&!b.next.attributes["cke-list-level"]&&
u.isEdgeListItem(a,b.next);)b=b.next,c.push(f.getElementIndentation(b)),d.push(b);var k=g(c,function(a,b){return 0===b?0:a-c[b-1]}),l=this.guessIndentationStep(h.filter(c,function(a){return 0!==a})),e=g(c,function(a){return Math.round(a/l)});-1!==h.indexOf(e,0)&&(e=g(e,function(a){return a+1}));h.forEach(d,function(a,b){a.attributes["cke-list-level"]=e[b]});return{indents:c,levels:e,diffs:k}}},guessIndentationStep:function(a){return a.length?Math.min.apply(null,a):null}};u=CKEDITOR.plugins.pastefromword.heuristics;
f.setListSymbol.removeRedundancies=function(a,b){(1===b&&"disc"===a["list-style-type"]||"decimal"===a["list-style-type"])&&delete a["list-style-type"]};CKEDITOR.plugins.pastefromword.createAttributeStack=x;CKEDITOR.config.pasteFromWord_heuristicsEdgeList=!0})();
=======
 Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
(function(){function y(a){for(var a=a.toUpperCase(),c=z.length,b=0,f=0;f<c;++f)for(var d=z[f],e=d[1].length;a.substr(0,e)==d[1];a=a.substr(e))b+=d[0];return b}function A(a){for(var a=a.toUpperCase(),c=B.length,b=1,f=1;0<a.length;f*=c)b+=B.indexOf(a.charAt(a.length-1))*f,a=a.substr(0,a.length-1);return b}var C=CKEDITOR.htmlParser.fragment.prototype,o=CKEDITOR.htmlParser.element.prototype;C.onlyChild=o.onlyChild=function(){var a=this.children;return 1==a.length&&a[0]||null};o.removeAnyChildWithName=
function(a){for(var c=this.children,b=[],f,d=0;d<c.length;d++)f=c[d],f.name&&(f.name==a&&(b.push(f),c.splice(d--,1)),b=b.concat(f.removeAnyChildWithName(a)));return b};o.getAncestor=function(a){for(var c=this.parent;c&&(!c.name||!c.name.match(a));)c=c.parent;return c};C.firstChild=o.firstChild=function(a){for(var c,b=0;b<this.children.length;b++)if(c=this.children[b],a(c)||c.name&&(c=c.firstChild(a)))return c;return null};o.addStyle=function(a,c,b){var f="";if("string"==typeof c)f+=a+":"+c+";";else{if("object"==
typeof a)for(var d in a)a.hasOwnProperty(d)&&(f+=d+":"+a[d]+";");else f+=a;b=c}this.attributes||(this.attributes={});a=this.attributes.style||"";a=(b?[f,a]:[a,f]).join(";");this.attributes.style=a.replace(/^;|;(?=;)/,"")};o.getStyle=function(a){var c=this.attributes.style;if(c)return c=CKEDITOR.tools.parseCssText(c,1),c[a]};CKEDITOR.dtd.parentOf=function(a){var c={},b;for(b in this)-1==b.indexOf("$")&&this[b][a]&&(c[b]=1);return c};var H=/^([.\d]*)+(em|ex|px|gd|rem|vw|vh|vm|ch|mm|cm|in|pt|pc|deg|rad|ms|s|hz|khz){1}?/i,
D=/^(?:\b0[^\s]*\s*){1,4}$/,x={ol:{decimal:/\d+/,"lower-roman":/^m{0,4}(cm|cd|d?c{0,3})(xc|xl|l?x{0,3})(ix|iv|v?i{0,3})$/,"upper-roman":/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/,"lower-alpha":/^[a-z]+$/,"upper-alpha":/^[A-Z]+$/},ul:{disc:/[l\u00B7\u2002]/,circle:/[\u006F\u00D8]/,square:/[\u006E\u25C6]/}},z=[[1E3,"M"],[900,"CM"],[500,"D"],[400,"CD"],[100,"C"],[90,"XC"],[50,"L"],[40,"XL"],[10,"X"],[9,"IX"],[5,"V"],[4,"IV"],[1,"I"]],B="ABCDEFGHIJKLMNOPQRSTUVWXYZ",s=0,t=null,w,E=CKEDITOR.plugins.pastefromword=
{utils:{createListBulletMarker:function(a,c){var b=new CKEDITOR.htmlParser.element("cke:listbullet");b.attributes={"cke:listsymbol":a[0]};b.add(new CKEDITOR.htmlParser.text(c));return b},isListBulletIndicator:function(a){if(/mso-list\s*:\s*Ignore/i.test(a.attributes&&a.attributes.style))return!0},isContainingOnlySpaces:function(a){var c;return(c=a.onlyChild())&&/^(:?\s|&nbsp;)+$/.test(c.value)},resolveList:function(a){var c=a.attributes,b;if((b=a.removeAnyChildWithName("cke:listbullet"))&&b.length&&
(b=b[0]))return a.name="cke:li",c.style&&(c.style=E.filters.stylesFilter([["text-indent"],["line-height"],[/^margin(:?-left)?$/,null,function(a){a=a.split(" ");a=CKEDITOR.tools.convertToPx(a[3]||a[1]||a[0]);!s&&(null!==t&&a>t)&&(s=a-t);t=a;c["cke:indent"]=s&&Math.ceil(a/s)+1||1}],[/^mso-list$/,null,function(a){var a=a.split(" "),b=Number(a[0].match(/\d+/)),a=Number(a[1].match(/\d+/));1==a&&(b!==w&&(c["cke:reset"]=1),w=b);c["cke:indent"]=a}]])(c.style,a)||""),c["cke:indent"]||(t=0,c["cke:indent"]=
1),CKEDITOR.tools.extend(c,b.attributes),!0;w=t=s=null;return!1},getStyleComponents:function(){var a=CKEDITOR.dom.element.createFromHtml('<div style="position:absolute;left:-9999px;top:-9999px;"></div>',CKEDITOR.document);CKEDITOR.document.getBody().append(a);return function(c,b,f){a.setStyle(c,b);for(var c={},b=f.length,d=0;d<b;d++)c[f[d]]=a.getStyle(f[d]);return c}}(),listDtdParents:CKEDITOR.dtd.parentOf("ol")},filters:{flattenList:function(a,c){var c="number"==typeof c?c:1,b=a.attributes,f;switch(b.type){case "a":f=
"lower-alpha";break;case "1":f="decimal"}for(var d=a.children,e,h=0;h<d.length;h++)if(e=d[h],e.name in CKEDITOR.dtd.$listItem){var j=e.attributes,g=e.children,m=g[g.length-1];m.name in CKEDITOR.dtd.$list&&(a.add(m,h+1),--g.length||d.splice(h--,1));e.name="cke:li";b.start&&!h&&(j.value=b.start);E.filters.stylesFilter([["tab-stops",null,function(a){(a=a.split(" ")[1].match(H))&&(t=CKEDITOR.tools.convertToPx(a[0]))}],1==c?["mso-list",null,function(a){a=a.split(" ");a=Number(a[0].match(/\d+/));a!==w&&
(j["cke:reset"]=1);w=a}]:null])(j.style);j["cke:indent"]=c;j["cke:listtype"]=a.name;j["cke:list-style-type"]=f}else if(e.name in CKEDITOR.dtd.$list){arguments.callee.apply(this,[e,c+1]);d=d.slice(0,h).concat(e.children).concat(d.slice(h+1));a.children=[];e=0;for(g=d.length;e<g;e++)a.add(d[e]);d=a.children}delete a.name;b["cke:list"]=1},assembleList:function(a){for(var c=a.children,b,f,d,e,h,j,a=[],g,m,i,l,k,p,n=0;n<c.length;n++)if(b=c[n],"cke:li"==b.name)if(b.name="li",f=b.attributes,i=(i=f["cke:listsymbol"])&&
i.match(/^(?:[(]?)([^\s]+?)([.)]?)$/),l=k=p=null,f["cke:ignored"])c.splice(n--,1);else{f["cke:reset"]&&(j=e=h=null);d=Number(f["cke:indent"]);d!=e&&(m=g=null);if(i){if(m&&x[m][g].test(i[1]))l=m,k=g;else for(var q in x)for(var u in x[q])if(x[q][u].test(i[1]))if("ol"==q&&/alpha|roman/.test(u)){if(g=/roman/.test(u)?y(i[1]):A(i[1]),!p||g<p)p=g,l=q,k=u}else{l=q;k=u;break}!l&&(l=i[2]?"ol":"ul")}else l=f["cke:listtype"]||"ol",k=f["cke:list-style-type"];m=l;g=k||("ol"==l?"decimal":"disc");k&&k!=("ol"==l?
"decimal":"disc")&&b.addStyle("list-style-type",k);if("ol"==l&&i){switch(k){case "decimal":p=Number(i[1]);break;case "lower-roman":case "upper-roman":p=y(i[1]);break;case "lower-alpha":case "upper-alpha":p=A(i[1])}b.attributes.value=p}if(j){if(d>e)a.push(j=new CKEDITOR.htmlParser.element(l)),j.add(b),h.add(j);else{if(d<e){e-=d;for(var r;e--&&(r=j.parent);)j=r.parent}j.add(b)}c.splice(n--,1)}else a.push(j=new CKEDITOR.htmlParser.element(l)),j.add(b),c[n]=j;h=b;e=d}else j&&(j=e=h=null);for(n=0;n<a.length;n++)if(j=
a[n],q=j.children,g=g=void 0,u=j.children.length,r=g=void 0,c=/list-style-type:(.*?)(?:;|$)/,e=CKEDITOR.plugins.pastefromword.filters.stylesFilter,g=j.attributes,!c.exec(g.style)){for(h=0;h<u;h++)if(g=q[h],g.attributes.value&&Number(g.attributes.value)==h+1&&delete g.attributes.value,g=c.exec(g.attributes.style))if(g[1]==r||!r)r=g[1];else{r=null;break}if(r){for(h=0;h<u;h++)g=q[h].attributes,g.style&&(g.style=e([["list-style-type"]])(g.style)||"");j.addStyle("list-style-type",r)}}w=t=s=null},falsyFilter:function(){return!1},
stylesFilter:function(a,c){return function(b,f){var d=[];(b||"").replace(/&quot;/g,'"').replace(/\s*([^ :;]+)\s*:\s*([^;]+)\s*(?=;|$)/g,function(b,e,g){e=e.toLowerCase();"font-family"==e&&(g=g.replace(/["']/g,""));for(var m,i,l,k=0;k<a.length;k++)if(a[k]&&(b=a[k][0],m=a[k][1],i=a[k][2],l=a[k][3],e.match(b)&&(!m||g.match(m)))){e=l||e;c&&(i=i||g);"function"==typeof i&&(i=i(g,f,e));i&&i.push&&(e=i[0],i=i[1]);"string"==typeof i&&d.push([e,i]);return}!c&&d.push([e,g])});for(var e=0;e<d.length;e++)d[e]=
d[e].join(":");return d.length?d.join(";")+";":!1}},elementMigrateFilter:function(a,c){return a?function(b){var f=c?(new CKEDITOR.style(a,c))._.definition:a;b.name=f.element;CKEDITOR.tools.extend(b.attributes,CKEDITOR.tools.clone(f.attributes));b.addStyle(CKEDITOR.style.getStyleText(f))}:function(){}},styleMigrateFilter:function(a,c){var b=this.elementMigrateFilter;return a?function(f,d){var e=new CKEDITOR.htmlParser.element(null),h={};h[c]=f;b(a,h)(e);e.children=d.children;d.children=[e];e.filter=
function(){};e.parent=d}:function(){}},bogusAttrFilter:function(a,c){if(-1==c.name.indexOf("cke:"))return!1},applyStyleFilter:null},getRules:function(a,c){var b=CKEDITOR.dtd,f=CKEDITOR.tools.extend({},b.$block,b.$listItem,b.$tableContent),d=a.config,e=this.filters,h=e.falsyFilter,j=e.stylesFilter,g=e.elementMigrateFilter,m=CKEDITOR.tools.bind(this.filters.styleMigrateFilter,this.filters),i=this.utils.createListBulletMarker,l=e.flattenList,k=e.assembleList,p=this.utils.isListBulletIndicator,n=this.utils.isContainingOnlySpaces,
q=this.utils.resolveList,u=function(a){a=CKEDITOR.tools.convertToPx(a);return isNaN(a)?a:a+"px"},r=this.utils.getStyleComponents,t=this.utils.listDtdParents,o=!1!==d.pasteFromWordRemoveFontStyles,s=!1!==d.pasteFromWordRemoveStyles;return{elementNames:[[/meta|link|script/,""]],root:function(a){a.filterChildren(c);k(a)},elements:{"^":function(a){var c;CKEDITOR.env.gecko&&(c=e.applyStyleFilter)&&c(a)},$:function(a){var v=a.name||"",e=a.attributes;v in f&&e.style&&(e.style=j([[/^(:?width|height)$/,null,
u]])(e.style)||"");if(v.match(/h\d/)){a.filterChildren(c);if(q(a))return;g(d["format_"+v])(a)}else if(v in b.$inline)a.filterChildren(c),n(a)&&delete a.name;else if(-1!=v.indexOf(":")&&-1==v.indexOf("cke")){a.filterChildren(c);if("v:imagedata"==v){if(v=a.attributes["o:href"])a.attributes.src=v;a.name="img";return}delete a.name}v in t&&(a.filterChildren(c),k(a))},style:function(a){if(CKEDITOR.env.gecko){var a=(a=a.onlyChild().value.match(/\/\* Style Definitions \*\/([\s\S]*?)\/\*/))&&a[1],c={};a&&
(a.replace(/[\n\r]/g,"").replace(/(.+?)\{(.+?)\}/g,function(a,b,F){for(var b=b.split(","),a=b.length,d=0;d<a;d++)CKEDITOR.tools.trim(b[d]).replace(/^(\w+)(\.[\w-]+)?$/g,function(a,b,d){b=b||"*";d=d.substring(1,d.length);d.match(/MsoNormal/)||(c[b]||(c[b]={}),d?c[b][d]=F:c[b]=F)})}),e.applyStyleFilter=function(a){var b=c["*"]?"*":a.name,d=a.attributes&&a.attributes["class"];b in c&&(b=c[b],"object"==typeof b&&(b=b[d]),b&&a.addStyle(b,!0))})}return!1},p:function(a){if(/MsoListParagraph/i.exec(a.attributes["class"])||
a.getStyle("mso-list")){var b=a.firstChild(function(a){return a.type==CKEDITOR.NODE_TEXT&&!n(a.parent)});(b=b&&b.parent)&&b.addStyle("mso-list","Ignore")}a.filterChildren(c);q(a)||(d.enterMode==CKEDITOR.ENTER_BR?(delete a.name,a.add(new CKEDITOR.htmlParser.element("br"))):g(d["format_"+(d.enterMode==CKEDITOR.ENTER_P?"p":"div")])(a))},div:function(a){var c=a.onlyChild();if(c&&"table"==c.name){var b=a.attributes;c.attributes=CKEDITOR.tools.extend(c.attributes,b);b.style&&c.addStyle(b.style);c=new CKEDITOR.htmlParser.element("div");
c.addStyle("clear","both");a.add(c);delete a.name}},td:function(a){a.getAncestor("thead")&&(a.name="th")},ol:l,ul:l,dl:l,font:function(a){if(p(a.parent))delete a.name;else{a.filterChildren(c);var b=a.attributes,d=b.style,e=a.parent;"font"==e.name?(CKEDITOR.tools.extend(e.attributes,a.attributes),d&&e.addStyle(d),delete a.name):(d=d||"",b.color&&("#000000"!=b.color&&(d+="color:"+b.color+";"),delete b.color),b.face&&(d+="font-family:"+b.face+";",delete b.face),b.size&&(d+="font-size:"+(3<b.size?"large":
3>b.size?"small":"medium")+";",delete b.size),a.name="span",a.addStyle(d))}},span:function(a){if(p(a.parent))return!1;a.filterChildren(c);if(n(a))return delete a.name,null;if(p(a)){var b=a.firstChild(function(a){return a.value||"img"==a.name}),e=(b=b&&(b.value||"l."))&&b.match(/^(?:[(]?)([^\s]+?)([.)]?)$/);if(e)return b=i(e,b),(a=a.getAncestor("span"))&&/ mso-hide:\s*all|display:\s*none /.test(a.attributes.style)&&(b.attributes["cke:ignored"]=1),b}if(e=(b=a.attributes)&&b.style)b.style=j([["line-height"],
[/^font-family$/,null,!o?m(d.font_style,"family"):null],[/^font-size$/,null,!o?m(d.fontSize_style,"size"):null],[/^color$/,null,!o?m(d.colorButton_foreStyle,"color"):null],[/^background-color$/,null,!o?m(d.colorButton_backStyle,"color"):null]])(e,a)||"";b.style||delete b.style;CKEDITOR.tools.isEmpty(b)&&delete a.name;return null},b:g(d.coreStyles_bold),i:g(d.coreStyles_italic),u:g(d.coreStyles_underline),s:g(d.coreStyles_strike),sup:g(d.coreStyles_superscript),sub:g(d.coreStyles_subscript),a:function(a){a=
a.attributes;a.href&&a.href.match(/^file:\/\/\/[\S]+#/i)&&(a.href=a.href.replace(/^file:\/\/\/[^#]+/i,""))},"cke:listbullet":function(a){a.getAncestor(/h\d/)&&!d.pasteFromWordNumberedHeadingToList&&delete a.name}},attributeNames:[[/^onmouse(:?out|over)/,""],[/^onload$/,""],[/(?:v|o):\w+/,""],[/^lang/,""]],attributes:{style:j(s?[[/^list-style-type$/,null],[/^margin$|^margin-(?!bottom|top)/,null,function(a,b,c){if(b.name in{p:1,div:1}){b="ltr"==d.contentsLangDirection?"margin-left":"margin-right";if("margin"==
c)a=r(c,a,[b])[b];else if(c!=b)return null;if(a&&!D.test(a))return[b,a]}return null}],[/^clear$/],[/^border.*|margin.*|vertical-align|float$/,null,function(a,b){if("img"==b.name)return a}],[/^width|height$/,null,function(a,b){if(b.name in{table:1,td:1,th:1,img:1})return a}]]:[[/^mso-/],[/-color$/,null,function(a){if("transparent"==a)return!1;if(CKEDITOR.env.gecko)return a.replace(/-moz-use-text-color/g,"transparent")}],[/^margin$/,D],["text-indent","0cm"],["page-break-before"],["tab-stops"],["display",
"none"],o?[/font-?/]:null],s),width:function(a,c){if(c.name in b.$tableContent)return!1},border:function(a,c){if(c.name in b.$tableContent)return!1},"class":h,bgcolor:h,valign:s?h:function(a,b){b.addStyle("vertical-align",a);return!1}},comment:!CKEDITOR.env.ie?function(a,b){var c=a.match(/<img.*?>/),d=a.match(/^\[if !supportLists\]([\s\S]*?)\[endif\]$/);return d?(d=(c=d[1]||c&&"l.")&&c.match(/>(?:[(]?)([^\s]+?)([.)]?)</),i(d,c)):CKEDITOR.env.gecko&&c?(c=CKEDITOR.htmlParser.fragment.fromHtml(c[0]).children[0],
(d=(d=(d=b.previous)&&d.value.match(/<v:imagedata[^>]*o:href=['"](.*?)['"]/))&&d[1])&&(c.attributes.src=d),c):!1}:h}}},G=function(){this.dataFilter=new CKEDITOR.htmlParser.filter};G.prototype={toHtml:function(a){var a=CKEDITOR.htmlParser.fragment.fromHtml(a),c=new CKEDITOR.htmlParser.basicWriter;a.writeHtml(c,this.dataFilter);return c.getHtml(!0)}};CKEDITOR.cleanWord=function(a,c){CKEDITOR.env.gecko&&(a=a.replace(/(<\!--\[if[^<]*?\])--\>([\S\s]*?)<\!--(\[endif\]--\>)/gi,"$1$2$3"));CKEDITOR.env.webkit&&
(a=a.replace(/(class="MsoListParagraph[^>]+><\!--\[if !supportLists\]--\>)([^<]+<span[^<]+<\/span>)(<\!--\[endif\]--\>)/gi,"$1<span>$2</span>$3"));var b=new G,f=b.dataFilter;f.addRules(CKEDITOR.plugins.pastefromword.getRules(c,f));c.fire("beforeCleanWord",{filter:f});try{a=b.toHtml(a)}catch(d){alert(c.lang.pastefromword.error)}a=a.replace(/cke:.*?".*?"/g,"");a=a.replace(/style=""/g,"");return a=a.replace(/<span>/g,"")}})();
>>>>>>> 4dd5d9fb3a74824a17e4415bb5694f61eff6c63d
