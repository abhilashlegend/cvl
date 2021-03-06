??    
      ?      ?       0     1     C     S  ?   c  ?  &  ?   ?     s  z   ?  K  ?     I     \    {  ?  ?     q	     ?	  	   ?	  ?   ?	  z  w
  ?   ?  
   ?  ?   ?  n  W
  
   ?     ?    ?              
       	              
                       Collapse All      Expand All How to Use      Just drag the pages <strong>up</strong> or <strong>down</strong> to change the page order and <strong>left</strong> or <strong>right</strong> to change the page`s parent, then hit "update".      The code here is very simple and flexible, for more information look up <a href="http://codex.wordpress.org/Template_Tags/wp_list_pages" title="wp_list_pages Documentation">wp_list_pages() in the Wordpress Codex</a> as it is very well documented and if you have any further questions or feedback I like getting messages, so <a href="http://joelstarnes.co.uk/contact/" title="email Joel Starnes">drop me an email</a>. The icon to the left of each page shows if it has child pages, <strong>double click</strong> on that item to toggle <strong>expand|collapse</strong> of it`s children.      Update         You can also hard-code pages to exclude and these will be merged with the pages you set to exclude in your pageMash admin. You can also use the function anywhere in your theme code. e.g. in your sidebar.php file (but the code in here will not run if you're using any widgets) or your header.php file (somewhere under the body tag, you may want to use the depth=1 parameter to only show top level pages). The code should look something like the following: pageMash           pageMash - pageManagement      pageMash works with the wp_list_pages function. The easiest way to use it is to put the pages widget in your sidebar [WP admin page > Appeaarance > Widgets]. Click the configure button on the widget and ensure that 'sort by' is set to 'page order'. Hey presto, you're done.      Project-Id-Version: pmash
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2008-12-14 10:21+0800
PO-Revision-Date: 
Last-Translator: Thomas Steinczhorn <tom@outsourcetoasia.de>
Language-Team: Outsource to Asia <tom@outsourcetoasia.de>
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
X-Poedit-Language: German
X-Poedit-Country: GERMANY
X-Poedit-SourceCharset: utf-8
X-Poedit-KeywordsList: _e;__
X-Poedit-Basepath: .
X-Poedit-SearchPath-0: .
 Alle einklappen Alle aufklappen Anleitung Einfach die Seiten <strong>rauf</strong> oder <strong>runter</strong> schieben um die Reihenfolge zu &auml;ndern. Nach <strong>links</strong> oder <strong>rechts</strong> um diese als Unterseite einer anderen zu machen. Der Code ist sehr einfach und flexibel. Weitere Informationen gibt es unter <a href="http://codex.wordpress.org/Template_Tags/wp_list_pages" title="wp_list_pages Dokumentation"> wp_list_pages() in the Wordpress Codex</a>. Sollten noch Fragen bzw. Anregungen vorhanden sein <a href="http://joelstarnes.co.uk/contact/" title="email Joel Starnes">sendet mir einfach eine Email</a>. Das Symbol links an jeder Seite zeigt an, ob Unterseiten vorhanden sind. Mit einem <strong>Doppel Klick</strong> k&ouml;nnen diese <strong>ein- oder ausgeklappen</strong>. Am Ende auf "Aktualisieren". klicken. Aktualisieren Du kannst aber auch Seiten direkt ausschließen. Diese werden dann verkn&uuml;pft mit den ausgeschlossenen Seiten im pageMash Admin. Du kannst die Funktion &uuml;berall in deinem Theme Code verwenden. Zum Beispiel in der sidebar.php ( sollte jedoch ein Widget aktive sein, wird es nicht funktionieren) oder in der header.php ( Irgendwo innerhalb des Body tag. Vielleicht m&ouml;chtest du nur die Top-Level Seiten anzeigen, nutze hierzu depth=1 Parameter). Der Code sollte in etwa wie folgt aussehen: Verwaltung pageMash - Seiten Verwaltung pageMash arbeitet mit der wp_list_pages Funktion. Die einfachste Methode ist, den Seiten Widget in der Sidebar zu aktivieren. [WP Admin > Darstellung > Widgets]. Klicke Konfiguration und stell sicher, dass die Sortierung auf "Seiten Sortierung" steht. Fertig! 