<<<<<<< HEAD
﻿CKEDITOR.dialog.add("scaytDialog",function(d){var f=d.scayt,p='\x3cp\x3e\x3cimg src\x3d"'+f.getLogo()+'" /\x3e\x3c/p\x3e\x3cp\x3e'+f.getLocal("version")+f.getVersion()+"\x3c/p\x3e\x3cp\x3e"+f.getLocal("text_copyrights")+"\x3c/p\x3e",q=CKEDITOR.document,l={isChanged:function(){return null===this.newLang||this.currentLang===this.newLang?!1:!0},currentLang:f.getLang(),newLang:null,reset:function(){this.currentLang=f.getLang();this.newLang=null},id:"lang"},p=[{id:"options",label:f.getLocal("tab_options"),
onShow:function(){},elements:[{type:"vbox",id:"scaytOptions",children:function(){var a=f.getApplicationConfig(),b=[],e={"ignore-all-caps-words":"label_allCaps","ignore-domain-names":"label_ignoreDomainNames","ignore-words-with-mixed-cases":"label_mixedCase","ignore-words-with-numbers":"label_mixedWithDigits"},h;for(h in a)a={type:"checkbox"},a.id=h,a.label=f.getLocal(e[h]),b.push(a);return b}(),onShow:function(){this.getChild();for(var a=d.scayt,b=0;b<this.getChild().length;b++)this.getChild()[b].setValue(a.getApplicationConfig()[this.getChild()[b].id])}}]},
{id:"langs",label:f.getLocal("tab_languages"),elements:[{id:"leftLangColumn",type:"vbox",align:"left",widths:["100"],children:[{type:"html",id:"langBox",style:"overflow: hidden; white-space: normal;margin-bottom:15px;",html:'\x3cdiv\x3e\x3cdiv style\x3d"float:left;width:45%;margin-left:5px;" id\x3d"left-col-'+d.name+'" class\x3d"scayt-lang-list"\x3e\x3c/div\x3e\x3cdiv style\x3d"float:left;width:45%;margin-left:15px;" id\x3d"right-col-'+d.name+'" class\x3d"scayt-lang-list"\x3e\x3c/div\x3e\x3c/div\x3e',
onShow:function(){var a=d.scayt.getLang();q.getById("scaytLang_"+d.name+"_"+a).$.checked=!0}},{type:"html",id:"graytLanguagesHint",html:'\x3cdiv style\x3d"margin:5px auto; width:95%;white-space:normal;" id\x3d"'+d.name+'graytLanguagesHint"\x3e\x3cspan style\x3d"width:10px;height:10px;display: inline-block; background:#02b620;vertical-align:top;margin-top:2px;"\x3e\x3c/span\x3e - This languages are supported by Grammar As You Type(GRAYT).\x3c/div\x3e',onShow:function(){var a=q.getById(d.name+"graytLanguagesHint");
d.config.grayt_autoStartup||(a.$.style.display="none")}}]}]},{id:"dictionaries",label:f.getLocal("tab_dictionaries"),elements:[{type:"vbox",id:"rightCol_col__left",children:[{type:"html",id:"dictionaryNote",html:""},{type:"text",id:"dictionaryName",label:f.getLocal("label_fieldNameDic")||"Dictionary name",onShow:function(a){var b=a.sender,e=d.scayt;setTimeout(function(){b.getContentElement("dictionaries","dictionaryNote").getElement().setText("");null!=e.getUserDictionaryName()&&""!=e.getUserDictionaryName()&&
b.getContentElement("dictionaries","dictionaryName").setValue(e.getUserDictionaryName())},0)}},{type:"hbox",id:"notExistDic",align:"left",style:"width:auto;",widths:["50%","50%"],children:[{type:"button",id:"createDic",label:f.getLocal("btn_createDic"),title:f.getLocal("btn_createDic"),onClick:function(){var a=this.getDialog(),b=n,e=d.scayt,h=a.getContentElement("dictionaries","dictionaryName").getValue();e.createUserDictionary(h,function(c){c.error||b.toggleDictionaryButtons.call(a,!0);c.dialog=
a;c.command="create";c.name=h;d.fire("scaytUserDictionaryAction",c)},function(c){c.dialog=a;c.command="create";c.name=h;d.fire("scaytUserDictionaryActionError",c)})}},{type:"button",id:"restoreDic",label:f.getLocal("btn_restoreDic"),title:f.getLocal("btn_restoreDic"),onClick:function(){var a=this.getDialog(),b=d.scayt,e=n,h=a.getContentElement("dictionaries","dictionaryName").getValue();b.restoreUserDictionary(h,function(c){c.dialog=a;c.error||e.toggleDictionaryButtons.call(a,!0);c.command="restore";
c.name=h;d.fire("scaytUserDictionaryAction",c)},function(c){c.dialog=a;c.command="restore";c.name=h;d.fire("scaytUserDictionaryActionError",c)})}}]},{type:"hbox",id:"existDic",align:"left",style:"width:auto;",widths:["50%","50%"],children:[{type:"button",id:"removeDic",label:f.getLocal("btn_deleteDic"),title:f.getLocal("btn_deleteDic"),onClick:function(){var a=this.getDialog(),b=d.scayt,e=n,h=a.getContentElement("dictionaries","dictionaryName"),c=h.getValue();b.removeUserDictionary(c,function(b){h.setValue("");
b.error||e.toggleDictionaryButtons.call(a,!1);b.dialog=a;b.command="remove";b.name=c;d.fire("scaytUserDictionaryAction",b)},function(b){b.dialog=a;b.command="remove";b.name=c;d.fire("scaytUserDictionaryActionError",b)})}},{type:"button",id:"renameDic",label:f.getLocal("btn_renameDic"),title:f.getLocal("btn_renameDic"),onClick:function(){var a=this.getDialog(),b=d.scayt,e=a.getContentElement("dictionaries","dictionaryName").getValue();b.renameUserDictionary(e,function(b){b.dialog=a;b.command="rename";
b.name=e;d.fire("scaytUserDictionaryAction",b)},function(b){b.dialog=a;b.command="rename";b.name=e;d.fire("scaytUserDictionaryActionError",b)})}}]},{type:"html",id:"dicInfo",html:'\x3cdiv id\x3d"dic_info_editor1" style\x3d"margin:5px auto; width:95%;white-space:normal;"\x3e'+f.getLocal("text_descriptionDic")+"\x3c/div\x3e"}]}]},{id:"about",label:f.getLocal("tab_about"),elements:[{type:"html",id:"about",style:"margin: 5px 5px;",html:'\x3cdiv\x3e\x3cdiv id\x3d"scayt_about_"\x3e'+p+"\x3c/div\x3e\x3c/div\x3e"}]}];
d.on("scaytUserDictionaryAction",function(a){var b=SCAYT.prototype.UILib,e=a.data.dialog,d=e.getContentElement("dictionaries","dictionaryNote").getElement(),c=a.editor.scayt,g;void 0===a.data.error?(g=c.getLocal("message_success_"+a.data.command+"Dic"),g=g.replace("%s",a.data.name),d.setText(g),b.css(d.$,{color:"blue"})):(""===a.data.name?d.setText(c.getLocal("message_info_emptyDic")):(g=c.getLocal("message_error_"+a.data.command+"Dic"),g=g.replace("%s",a.data.name),d.setText(g)),b.css(d.$,{color:"red"}),
null!=c.getUserDictionaryName()&&""!=c.getUserDictionaryName()?e.getContentElement("dictionaries","dictionaryName").setValue(c.getUserDictionaryName()):e.getContentElement("dictionaries","dictionaryName").setValue(""))});d.on("scaytUserDictionaryActionError",function(a){var b=SCAYT.prototype.UILib,e=a.data.dialog,d=e.getContentElement("dictionaries","dictionaryNote").getElement(),c=a.editor.scayt,g;""===a.data.name?d.setText(c.getLocal("message_info_emptyDic")):(g=c.getLocal("message_error_"+a.data.command+
"Dic"),g=g.replace("%s",a.data.name),d.setText(g));b.css(d.$,{color:"red"});null!=c.getUserDictionaryName()&&""!=c.getUserDictionaryName()?e.getContentElement("dictionaries","dictionaryName").setValue(c.getUserDictionaryName()):e.getContentElement("dictionaries","dictionaryName").setValue("")});var n={title:f.getLocal("text_title"),resizable:CKEDITOR.DIALOG_RESIZE_BOTH,minWidth:"moono-lisa"==(CKEDITOR.skinName||d.config.skin)?450:340,minHeight:260,onLoad:function(){if(0!=d.config.scayt_uiTabs[1]){var a=
n,b=a.getLangBoxes.call(this);b.getParent().setStyle("white-space","normal");a.renderLangList(b);this.definition.minWidth=this.getSize().width;this.resize(this.definition.minWidth,this.definition.minHeight)}},onCancel:function(){l.reset()},onHide:function(){d.unlockSelection()},onShow:function(){d.fire("scaytDialogShown",this);if(0!=d.config.scayt_uiTabs[2]){var a=d.scayt,b=this.getContentElement("dictionaries","dictionaryName"),e=this.getContentElement("dictionaries","existDic").getElement().getParent(),
h=this.getContentElement("dictionaries","notExistDic").getElement().getParent();e.hide();h.hide();null!=a.getUserDictionaryName()&&""!=a.getUserDictionaryName()?(this.getContentElement("dictionaries","dictionaryName").setValue(a.getUserDictionaryName()),e.show()):(b.setValue(""),h.show())}},onOk:function(){var a=n,b=d.scayt;this.getContentElement("options","scaytOptions");a=a.getChangedOption.call(this);b.commitOption({changedOptions:a})},toggleDictionaryButtons:function(a){var b=this.getContentElement("dictionaries",
"existDic").getElement().getParent(),d=this.getContentElement("dictionaries","notExistDic").getElement().getParent();a?(b.show(),d.hide()):(b.hide(),d.show())},getChangedOption:function(){var a={};if(1==d.config.scayt_uiTabs[0])for(var b=this.getContentElement("options","scaytOptions").getChild(),e=0;e<b.length;e++)b[e].isChanged()&&(a[b[e].id]=b[e].getValue());l.isChanged()&&(a[l.id]=d.config.scayt_sLang=l.currentLang=l.newLang);return a},buildRadioInputs:function(a,b,e){var h=new CKEDITOR.dom.element("div"),
c="scaytLang_"+d.name+"_"+b,g=CKEDITOR.dom.element.createFromHtml('\x3cinput id\x3d"'+c+'" type\x3d"radio"  value\x3d"'+b+'" name\x3d"scayt_lang" /\x3e'),f=new CKEDITOR.dom.element("label"),m=d.scayt;h.setStyles({"white-space":"normal",position:"relative","padding-bottom":"2px"});g.on("click",function(a){l.newLang=a.sender.getValue()});f.appendText(a);f.setAttribute("for",c);e&&d.config.grayt_autoStartup&&f.setStyles({color:"#02b620"});h.append(g);h.append(f);b===m.getLang()&&(g.setAttribute("checked",
!0),g.setAttribute("defaultChecked","defaultChecked"));return h},renderLangList:function(a){var b=a.find("#left-col-"+d.name).getItem(0);a=a.find("#right-col-"+d.name).getItem(0);var e=f.getScaytLangList(),h=f.getGraytLangList(),c={},g=[],l=0,m=!1,k;for(k in e.ltr)c[k]=e.ltr[k];for(k in e.rtl)c[k]=e.rtl[k];for(k in c)g.push([k,c[k]]);g.sort(function(a,b){var c=0;a[1]>b[1]?c=1:a[1]<b[1]&&(c=-1);return c});c={};for(m=0;m<g.length;m++)c[g[m][0]]=g[m][1];g=Math.round(g.length/2);for(k in c)l++,m=k in
h.ltr||k in h.rtl,this.buildRadioInputs(c[k],k,m).appendTo(l<=g?b:a)},getLangBoxes:function(){return this.getContentElement("langs","langBox").getElement()},contents:function(a,b){var d=[],f=b.config.scayt_uiTabs;if(f){for(var c in f)1==f[c]&&d.push(a[c]);d.push(a[a.length-1])}else return a;return d}(p,d)};return n});
=======
﻿CKEDITOR.dialog.add("scaytDialog",function(f){var g=f.scayt,k='<p><img src="'+g.getLogo()+'" /></p><p>'+g.getLocal("version")+g.getVersion()+"</p><p>"+g.getLocal("text_copyrights")+"</p>",l=CKEDITOR.document,i={isChanged:function(){return null===this.newLang||this.currentLang===this.newLang?!1:!0},currentLang:g.getLang(),newLang:null,reset:function(){this.currentLang=g.getLang();this.newLang=null},id:"lang"},k=[{id:"options",label:g.getLocal("tab_options"),onShow:function(){},elements:[{type:"vbox",
id:"scaytOptions",children:function(){var a=g.getApplicationConfig(),e=[],b={"ignore-all-caps-words":"label_allCaps","ignore-domain-names":"label_ignoreDomainNames","ignore-words-with-mixed-cases":"label_mixedCase","ignore-words-with-numbers":"label_mixedWithDigits"},d;for(d in a){var c={type:"checkbox"};c.id=d;c.label=g.getLocal(b[d]);e.push(c)}return e}(),onShow:function(){this.getChild();for(var a=f.scayt,e=0;e<this.getChild().length;e++)this.getChild()[e].setValue(a.getApplicationConfig()[this.getChild()[e].id])}}]},
{id:"langs",label:g.getLocal("tab_languages"),elements:[{id:"leftLangColumn",type:"vbox",align:"left",widths:["100"],children:[{type:"html",id:"langBox",style:"overflow: hidden; white-space: normal;",html:'<form><div style="float:left;width:45%;margin-left:5px;" id="left-col-'+f.name+'"></div><div style="float:left;width:45%;margin-left:15px;" id="right-col-'+f.name+'"></div></form>',onShow:function(){var a=f.scayt.getLang();l.getById("scaytLang_"+a).$.checked=!0}}]}]},{id:"dictionaries",label:g.getLocal("tab_dictionaries"),
elements:[{type:"vbox",id:"rightCol_col__left",children:[{type:"html",id:"dictionaryNote",html:""},{type:"text",id:"dictionaryName",label:g.getLocal("label_fieldNameDic")||"Dictionary name",onShow:function(a){var e=a.sender,b=f.scayt;setTimeout(function(){e.getContentElement("dictionaries","dictionaryNote").getElement().setText("");null!=b.getUserDictionaryName()&&""!=b.getUserDictionaryName()&&e.getContentElement("dictionaries","dictionaryName").setValue(b.getUserDictionaryName())},0)}},{type:"hbox",
id:"notExistDic",align:"left",style:"width:auto;",widths:["50%","50%"],children:[{type:"button",id:"createDic",label:g.getLocal("btn_createDic"),title:g.getLocal("btn_createDic"),onClick:function(){var a=this.getDialog(),e=j,b=f.scayt,d=a.getContentElement("dictionaries","dictionaryName").getValue();b.createUserDictionary(d,function(c){c.error||e.toggleDictionaryButtons.call(a,!0);c.dialog=a;c.command="create";c.name=d;f.fire("scaytUserDictionaryAction",c)},function(c){c.dialog=a;c.command="create";
c.name=d;f.fire("scaytUserDictionaryActionError",c)})}},{type:"button",id:"restoreDic",label:g.getLocal("btn_restoreDic"),title:g.getLocal("btn_restoreDic"),onClick:function(){var a=this.getDialog(),e=f.scayt,b=j,d=a.getContentElement("dictionaries","dictionaryName").getValue();e.restoreUserDictionary(d,function(c){c.dialog=a;c.error||b.toggleDictionaryButtons.call(a,!0);c.command="restore";c.name=d;f.fire("scaytUserDictionaryAction",c)},function(c){c.dialog=a;c.command="restore";c.name=d;f.fire("scaytUserDictionaryActionError",
c)})}}]},{type:"hbox",id:"existDic",align:"left",style:"width:auto;",widths:["50%","50%"],children:[{type:"button",id:"removeDic",label:g.getLocal("btn_deleteDic"),title:g.getLocal("btn_deleteDic"),onClick:function(){var a=this.getDialog(),e=f.scayt,b=j,d=a.getContentElement("dictionaries","dictionaryName"),c=d.getValue();e.removeUserDictionary(c,function(e){d.setValue("");e.error||b.toggleDictionaryButtons.call(a,!1);e.dialog=a;e.command="remove";e.name=c;f.fire("scaytUserDictionaryAction",e)},function(b){b.dialog=
a;b.command="remove";b.name=c;f.fire("scaytUserDictionaryActionError",b)})}},{type:"button",id:"renameDic",label:g.getLocal("btn_renameDic"),title:g.getLocal("btn_renameDic"),onClick:function(){var a=this.getDialog(),e=f.scayt,b=a.getContentElement("dictionaries","dictionaryName").getValue();e.renameUserDictionary(b,function(d){d.dialog=a;d.command="rename";d.name=b;f.fire("scaytUserDictionaryAction",d)},function(d){d.dialog=a;d.command="rename";d.name=b;f.fire("scaytUserDictionaryActionError",d)})}}]},
{type:"html",id:"dicInfo",html:'<div id="dic_info_editor1" style="margin:5px auto; width:95%;white-space:normal;">'+g.getLocal("text_descriptionDic")+"</div>"}]}]},{id:"about",label:g.getLocal("tab_about"),elements:[{type:"html",id:"about",style:"margin: 5px 5px;",html:'<div><div id="scayt_about_">'+k+"</div></div>"}]}];f.on("scaytUserDictionaryAction",function(a){var e=a.data.dialog,b=e.getContentElement("dictionaries","dictionaryNote").getElement(),d=a.editor.scayt,c;void 0===a.data.error?(c=d.getLocal("message_success_"+
a.data.command+"Dic"),c=c.replace("%s",a.data.name),b.setText(c),SCAYT.$(b.$).css({color:"blue"})):(""===a.data.name?b.setText(d.getLocal("message_info_emptyDic")):(c=d.getLocal("message_error_"+a.data.command+"Dic"),c=c.replace("%s",a.data.name),b.setText(c)),SCAYT.$(b.$).css({color:"red"}),null!=d.getUserDictionaryName()&&""!=d.getUserDictionaryName()?e.getContentElement("dictionaries","dictionaryName").setValue(d.getUserDictionaryName()):e.getContentElement("dictionaries","dictionaryName").setValue(""))});
f.on("scaytUserDictionaryActionError",function(a){var e=a.data.dialog,b=e.getContentElement("dictionaries","dictionaryNote").getElement(),d=a.editor.scayt,c;""===a.data.name?b.setText(d.getLocal("message_info_emptyDic")):(c=d.getLocal("message_error_"+a.data.command+"Dic"),c=c.replace("%s",a.data.name),b.setText(c));SCAYT.$(b.$).css({color:"red"});null!=d.getUserDictionaryName()&&""!=d.getUserDictionaryName()?e.getContentElement("dictionaries","dictionaryName").setValue(d.getUserDictionaryName()):
e.getContentElement("dictionaries","dictionaryName").setValue("")});var j={title:g.getLocal("text_title"),resizable:CKEDITOR.DIALOG_RESIZE_BOTH,minWidth:340,minHeight:260,onLoad:function(){if(0!=f.config.scayt_uiTabs[1]){var a=j,e=a.getLangBoxes.call(this);e.getParent().setStyle("white-space","normal");a.renderLangList(e);this.definition.minWidth=this.getSize().width;this.resize(this.definition.minWidth,this.definition.minHeight)}},onCancel:function(){i.reset()},onHide:function(){f.unlockSelection()},
onShow:function(){f.fire("scaytDialogShown",this);if(0!=f.config.scayt_uiTabs[2]){var a=f.scayt,e=this.getContentElement("dictionaries","dictionaryName"),b=this.getContentElement("dictionaries","existDic").getElement().getParent(),d=this.getContentElement("dictionaries","notExistDic").getElement().getParent();b.hide();d.hide();null!=a.getUserDictionaryName()&&""!=a.getUserDictionaryName()?(this.getContentElement("dictionaries","dictionaryName").setValue(a.getUserDictionaryName()),b.show()):(e.setValue(""),
d.show())}},onOk:function(){var a=j,e=f.scayt;this.getContentElement("options","scaytOptions");a=a.getChangedOption.call(this);e.commitOption({changedOptions:a})},toggleDictionaryButtons:function(a){var e=this.getContentElement("dictionaries","existDic").getElement().getParent(),b=this.getContentElement("dictionaries","notExistDic").getElement().getParent();a?(e.show(),b.hide()):(e.hide(),b.show())},getChangedOption:function(){var a={};if(1==f.config.scayt_uiTabs[0])for(var e=this.getContentElement("options",
"scaytOptions").getChild(),b=0;b<e.length;b++)e[b].isChanged()&&(a[e[b].id]=e[b].getValue());i.isChanged()&&(a[i.id]=f.config.scayt_sLang=i.currentLang=i.newLang);return a},buildRadioInputs:function(a,e){var b=new CKEDITOR.dom.element("div");CKEDITOR.document.createElement("div");var d="scaytLang_"+e,c=CKEDITOR.dom.element.createFromHtml('<input id="'+d+'" type="radio"  value="'+e+'" name="scayt_lang" />'),g=new CKEDITOR.dom.element("label"),h=f.scayt;b.setStyles({"white-space":"normal",position:"relative"});
c.on("click",function(a){i.newLang=a.sender.getValue()});g.appendText(a);g.setAttribute("for",d);b.append(c);b.append(g);e===h.getLang()&&(c.setAttribute("checked",!0),c.setAttribute("defaultChecked","defaultChecked"));return b},renderLangList:function(a){var e=a.find("#left-col-"+f.name).getItem(0),a=a.find("#right-col-"+f.name).getItem(0),b=g.getLangList(),d={},c=[],i=0,h;for(h in b.ltr)d[h]=b.ltr[h];for(h in b.rtl)d[h]=b.rtl[h];for(h in d)c.push([h,d[h]]);c.sort(function(a,b){var c=0;a[1]>b[1]?
c=1:a[1]<b[1]&&(c=-1);return c});d={};for(b=0;b<c.length;b++)d[c[b][0]]=c[b][1];c=Math.round(c.length/2);for(h in d)i++,this.buildRadioInputs(d[h],h).appendTo(i<=c?e:a)},getLangBoxes:function(){return this.getContentElement("langs","langBox").getElement()},contents:function(a,e){var b=[],d=e.config.scayt_uiTabs;if(d){for(var c in d)1==d[c]&&b.push(a[c]);b.push(a[a.length-1])}else return a;return b}(k,f)};return j});
>>>>>>> 4dd5d9fb3a74824a17e4415bb5694f61eff6c63d
