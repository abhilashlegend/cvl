??    
      ?      ?       0     1     C     S  ?   c  ?  &  ?   ?     s  z   ?  K  ?     I     \    {  ?  ?  
   ~	     ?	     ?	  	  ?	  ?  ?
  ?  7  	   w
  ?   ?
  ^       t     }  
  ?              
       	              
                       Collapse All      Expand All How to Use      Just drag the pages <strong>up</strong> or <strong>down</strong> to change the page order and <strong>left</strong> or <strong>right</strong> to change the page`s parent, then hit "update".      The code here is very simple and flexible, for more information look up <a href="http://codex.wordpress.org/Template_Tags/wp_list_pages" title="wp_list_pages Documentation">wp_list_pages() in the Wordpress Codex</a> as it is very well documented and if you have any further questions or feedback I like getting messages, so <a href="http://joelstarnes.co.uk/contact/" title="email Joel Starnes">drop me an email</a>. The icon to the left of each page shows if it has child pages, <strong>double click</strong> on that item to toggle <strong>expand|collapse</strong> of it`s children.      Update         You can also hard-code pages to exclude and these will be merged with the pages you set to exclude in your pageMash admin. You can also use the function anywhere in your theme code. e.g. in your sidebar.php file (but the code in here will not run if you're using any widgets) or your header.php file (somewhere under the body tag, you may want to use the depth=1 parameter to only show top level pages). The code should look something like the following: pageMash           pageMash - pageManagement      pageMash works with the wp_list_pages function. The easiest way to use it is to put the pages widget in your sidebar [WP admin page > Appeaarance > Widgets]. Click the configure button on the widget and ensure that 'sort by' is set to 'page order'. Hey presto, you're done.      Project-Id-Version: pmash
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2008-12-14 10:21+0800
PO-Revision-Date: 
Last-Translator: Omer Faruk - wordpress.info.tr <admin@wordpress.info.tr>
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
 Hepsini Kapat Hepsini Aç Nasıl Kullanılır Sayfa düzenini değiştirmek için sadece sayfaları <strong>yukarı</strong> ya da <strong>aşağı</strong> doğru bırak ve sayfanın parentini değiştirmek için  <strong>sol</strong> ya da <strong>sağ</strong> olarak değiştir, sonra tıkla: "update".      Kod sade ve kullanımlıdır, daha fazla bilgi için incele <a href="http://codex.wordpress.org/Template_Tags/wp_list_pages" title="wp_list_pages Documentation">wp_list_pages() in the Wordpress Codex</a> bol dökümanı bulabilirsiniz. Bana soru sorabilir veya feedback yapabilirsiniz. E-mail: <a href="http://joelstarnes.co.uk/contact/" title="email Joel Starnes">bana mail yaz.</a>. Eğer bir iconun üzerinde + işareti görünüyorsa, bu, o sayfanın alt sayfaları var anlamına gelir, Alt sayfalarını görmek için veya kapatmak için o sayfanın iconuna <strong>çift tıklayın</strong>. Hepsini açıp kapatmak için tıkla <strong>Hepsini Aç/Hepsini Kapat</strong> seçeneklerine tıklayın. Güncelle Zor-kod sayfalarından istersen dışlayabilirsin ve bunlar senin pageMash admin sayfalarında ayarlayıp dışta tuttuğun sayfalarla birleşecek  Bu eklentiyi sidebar.php dosyasının içindeki kodu ile heryerde kullanabilirsiniz. ( Sidebar kısmında kullanılırken diğer kısımlarda kullanılamaz) Örnek header.php kısmında. ( bazı yerlerde derinliği=1(depth=1 olarak kullanmak isteyebilirsiniz, sadece popüler sayfaları göstermek için ). Kodlar takiben gördüğünüz gibi olmalı pageMash pageMash - Sayfa Yönetimi pageMash. wp_list_pages function ile birlikte çalışmaktadır. Yan menüde bu eklentiyi kullanmanın kolay yolu şu 'WP Admin Sayfası\> Görünüm \> Bileşenler'. Ayarlar butonuna tıkla ve 'sort by' kısmını 'sayfa düzenine' ayarla ve olduğunu garantiye al. 