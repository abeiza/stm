(function(a){a.jgrid=a.jgrid||{};a.extend(!0,a.jgrid,{defaults:{locale:"ar"},locales:{ar:{name:"\u0627\u0644\u0639\u0631\u0628\u064a\u0629",nameEnglish:"Arabic",isRTL:!0,defaults:{recordtext:"\u062a\u0633\u062c\u064a\u0644 {0} - {1} \u0639\u0644\u0649 {2}",emptyrecords:"\u0644\u0627 \u064a\u0648\u062c\u062f \u062a\u0633\u062c\u064a\u0644",loadtext:"\u062a\u062d\u0645\u064a\u0644...",pgtext:"\u0635\u0641\u062d\u0629 {0} \u0639\u0644\u0649 {1}",pgfirst:"First Page",pglast:"Last Page",pgnext:"Next Page",
pgprev:"Previous Page",pgrecs:"Records per Page",showhide:"Toggle Expand Collapse Grid",savetext:"\u064a\u062a\u0645 \u0627\u0644\u0622\u0646 \u0627\u0644\u062d\u0641\u0638..."},search:{caption:"\u0628\u062d\u062b...",Find:"\u0628\u062d\u062b",Reset:"\u0625\u0644\u063a\u0627\u0621",odata:[{oper:"eq",text:"\u064a\u0633\u0627\u0648\u064a"},{oper:"ne",text:"\u064a\u062e\u062a\u0644\u0641"},{oper:"lt",text:"\u0623\u0642\u0644"},{oper:"le",text:"\u0623\u0642\u0644 \u0623\u0648 \u064a\u0633\u0627\u0648\u064a"},
{oper:"gt",text:"\u0623\u0643\u0628\u0631"},{oper:"ge",text:"\u0623\u0643\u0628\u0631 \u0623\u0648 \u064a\u0633\u0627\u0648\u064a"},{oper:"bw",text:"\u064a\u0628\u062f\u0623 \u0628\u0640"},{oper:"bn",text:"\u0644\u0627 \u064a\u0628\u062f\u0623 \u0628\u0640"},{oper:"in",text:"est dans"},{oper:"ni",text:"n'est pas dans"},{oper:"ew",text:"\u064a\u0646\u062a\u0647 \u0628\u0640"},{oper:"en",text:"\u0644\u0627 \u064a\u0646\u062a\u0647 \u0628\u0640"},{oper:"cn",text:"\u064a\u062d\u062a\u0648\u064a"},{oper:"nc",
text:"\u0644\u0627 \u064a\u062d\u062a\u0648\u064a"},{oper:"nu",text:"is null"},{oper:"nn",text:"is not null"}],groupOps:[{op:"\u0645\u0639",text:"\u0627\u0644\u0643\u0644"},{op:"\u0623\u0648",text:"\u0644\u0627 \u0623\u062d\u062f"}],operandTitle:"Click to select search operation.",resetTitle:"Reset Search Value"},edit:{addCaption:"\u0627\u0636\u0627\u0641\u0629",editCaption:"\u062a\u062d\u062f\u064a\u062b",bSubmit:"\u062a\u062b\u0628\u064a\u062b",bCancel:"\u0625\u0644\u063a\u0627\u0621",bClose:"\u063a\u0644\u0642",
saveData:"\u062a\u063a\u064a\u0631\u062a \u0627\u0644\u0645\u0639\u0637\u064a\u0627\u062a \u0647\u0644 \u062a\u0631\u064a\u062f \u0627\u0644\u062a\u0633\u062c\u064a\u0644 ?",bYes:"\u0646\u0639\u0645",bNo:"\u0644\u0627",bExit:"\u0625\u0644\u063a\u0627\u0621",msg:{required:"\u062e\u0627\u0646\u0629 \u0625\u062c\u0628\u0627\u0631\u064a\u0629",number:"\u0633\u062c\u0644 \u0631\u0642\u0645 \u0635\u062d\u064a\u062d",minValue:"\u064a\u062c\u0628 \u0623\u0646 \u062a\u0643\u0648\u0646 \u0627\u0644\u0642\u064a\u0645\u0629 \u0623\u0643\u0628\u0631 \u0623\u0648 \u062a\u0633\u0627\u0648\u064a 0",
maxValue:"\u064a\u062c\u0628 \u0623\u0646 \u062a\u0643\u0648\u0646 \u0627\u0644\u0642\u064a\u0645\u0629 \u0623\u0642\u0644 \u0623\u0648 \u062a\u0633\u0627\u0648\u064a 0",email:"\u0628\u0631\u064a\u062f \u063a\u064a\u0631 \u0635\u062d\u064a\u062d",integer:"\u0633\u062c\u0644 \u0639\u062f\u062f \u0637\u0628\u064a\u064a\u0639\u064a \u0635\u062d\u064a\u062d",url:"\u0644\u064a\u0633 \u0639\u0646\u0648\u0627\u0646\u0627 \u0635\u062d\u064a\u062d\u0627. \u0627\u0644\u0628\u062f\u0627\u064a\u0629 \u0627\u0644\u0635\u062d\u064a\u062d\u0629 ('http://' \u0623\u0648 'https://')",
nodefined:" \u0644\u064a\u0633 \u0645\u062d\u062f\u062f!",novalue:" \u0642\u064a\u0645\u0629 \u0627\u0644\u0631\u062c\u0648\u0639 \u0645\u0637\u0644\u0648\u0628\u0629!",customarray:"\u064a\u062c\u0628 \u0639\u0644\u0649 \u0627\u0644\u062f\u0627\u0644\u0629 \u0627\u0644\u0634\u062e\u0635\u064a\u0629 \u0623\u0646 \u062a\u0646\u062a\u062c \u062c\u062f\u0648\u0644\u0627",customfcheck:"\u0627\u0644\u062f\u0627\u0644\u0629 \u0627\u0644\u0634\u062e\u0635\u064a\u0629 \u0645\u0637\u0644\u0648\u0628\u0629 \u0641\u064a \u062d\u0627\u0644\u0629 \u0627\u0644\u062a\u062d\u0642\u0642 \u0627\u0644\u0634\u062e\u0635\u064a"}},
view:{caption:"\u0631\u0623\u064a\u062a \u0627\u0644\u062a\u0633\u062c\u064a\u0644\u0627\u062a",bClose:"\u063a\u0644\u0642"},del:{caption:"\u062d\u0630\u0641",msg:"\u062d\u0630\u0641 \u0627\u0644\u062a\u0633\u062c\u064a\u0644\u0627\u062a \u0627\u0644\u0645\u062e\u062a\u0627\u0631\u0629 ?",bSubmit:"\u062d\u0630\u0641",bCancel:"\u0625\u0644\u063a\u0627\u0621"},nav:{edittext:"",edittitle:"\u062a\u063a\u064a\u064a\u0631 \u0627\u0644\u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u0645\u062e\u062a\u0627\u0631",
addtext:"",addtitle:"\u0625\u0636\u0627\u0641\u0629 \u062a\u0633\u062c\u064a\u0644",deltext:"",deltitle:"\u062d\u0630\u0641 \u0627\u0644\u062a\u0633\u062c\u064a\u0644 \u0627\u0644\u0645\u062e\u062a\u0627\u0631",searchtext:"",searchtitle:"\u0628\u062d\u062b \u0639\u0646 \u062a\u0633\u062c\u064a\u0644",refreshtext:"",refreshtitle:"\u062a\u062d\u062f\u064a\u062b \u0627\u0644\u062c\u062f\u0648\u0644",alertcap:"\u062a\u062d\u0630\u064a\u0631",alerttext:"\u064a\u0631\u062c\u0649 \u0625\u062e\u062a\u064a\u0627\u0631 \u0627\u0644\u0633\u0637\u0631",
viewtext:"",viewtitle:"\u0625\u0638\u0647\u0627\u0631 \u0627\u0644\u0633\u0637\u0631 \u0627\u0644\u0645\u062e\u062a\u0627\u0631"},col:{caption:"\u0625\u0638\u0647\u0627\u0631/\u0625\u062e\u0641\u0627\u0621 \u0627\u0644\u0623\u0639\u0645\u062f\u0629",bSubmit:"\u062a\u062b\u0628\u064a\u062b",bCancel:"\u0625\u0644\u063a\u0627\u0621"},errors:{errcap:"\u062e\u0637\u0623",nourl:"\u0644\u0627 \u064a\u0648\u062c\u062f \u0639\u0646\u0648\u0627\u0646 \u0645\u062d\u062f\u062f",norecords:"\u0644\u0627 \u064a\u0648\u062c\u062f \u062a\u0633\u062c\u064a\u0644 \u0644\u0644\u0645\u0639\u0627\u0644\u062c\u0629",
model:"\u0639\u062f\u062f \u0627\u0644\u0639\u0646\u0627\u0648\u064a\u0646 (colNames) <> \u0639\u062f\u062f \u0627\u0644\u062a\u0633\u062c\u064a\u0644\u0627\u062a (colModel)!"},formatter:{integer:{thousandsSeparator:" ",defaultValue:"0"},number:{decimalSeparator:",",thousandsSeparator:" ",decimalPlaces:2,defaultValue:"0,00"},currency:{decimalSeparator:",",thousandsSeparator:" ",decimalPlaces:2,prefix:"",suffix:"",defaultValue:"0,00"},date:{dayNames:"\u0627\u0644\u0623\u062d\u062f \u0627\u0644\u0625\u062b\u0646\u064a\u0646 \u0627\u0644\u062b\u0644\u0627\u062b\u0627\u0621 \u0627\u0644\u0623\u0631\u0628\u0639\u0627\u0621 \u0627\u0644\u062e\u0645\u064a\u0633 \u0627\u0644\u062c\u0645\u0639\u0629 \u0627\u0644\u0633\u0628\u062a \u0627\u0644\u0623\u062d\u062f \u0627\u0644\u0625\u062b\u0646\u064a\u0646 \u0627\u0644\u062b\u0644\u0627\u062b\u0627\u0621 \u0627\u0644\u0623\u0631\u0628\u0639\u0627\u0621 \u0627\u0644\u062e\u0645\u064a\u0633 \u0627\u0644\u062c\u0645\u0639\u0629 \u0627\u0644\u0633\u0628\u062a".split(" "),
monthNames:"\u062c\u0627\u0646\u0641\u064a \u0641\u064a\u0641\u0631\u064a \u0645\u0627\u0631\u0633 \u0623\u0641\u0631\u064a\u0644 \u0645\u0627\u064a \u062c\u0648\u0627\u0646 \u062c\u0648\u064a\u0644\u064a\u0629 \u0623\u0648\u062a \u0633\u0628\u062a\u0645\u0628\u0631 \u0623\u0643\u062a\u0648\u0628\u0631 \u0646\u0648\u0641\u0645\u0628\u0631 \u062f\u064a\u0633\u0645\u0628\u0631 \u062c\u0627\u0646\u0641\u064a \u0641\u064a\u0641\u0631\u064a \u0645\u0627\u0631\u0633 \u0623\u0641\u0631\u064a\u0644 \u0645\u0627\u064a \u062c\u0648\u0627\u0646 \u062c\u0648\u064a\u0644\u064a\u0629 \u0623\u0648\u062a \u0633\u0628\u062a\u0645\u0628\u0631 \u0623\u0643\u062a\u0648\u0628\u0631 \u0646\u0648\u0641\u0645\u0628\u0631 \u062f\u064a\u0633\u0645\u0628\u0631".split(" "),
AmPm:["\u0635\u0628\u0627\u062d\u0627","\u0645\u0633\u0627\u0621\u0627","\u0635\u0628\u0627\u062d\u0627","\u0645\u0633\u0627\u0621\u0627"],S:function(a){return 1===a?"er":"e"},srcformat:"Y-m-d",newformat:"d/m/Y",masks:{ShortDate:"n/j/Y",LongDate:"l, F d, Y",FullDateTime:"l, F d, Y g:i:s A",MonthDay:"F d",ShortTime:"g:i A",LongTime:"g:i:s A",YearMonth:"F, Y"}}}}}})})(jQuery);
