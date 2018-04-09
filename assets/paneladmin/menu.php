<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                <?php echo "Hallo,$_SESSION[namalengkap]"; ?>
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="img/users/aqvatarius.jpg" class="img-polaroid"/>                
            </div>
            <ul class="control"> 
                <li><span class="icon-user"></span> <?php echo "Hallo, $_SESSION[namalengkap]"; ?></li>               
                <li><span class="icon-share-alt"></span> <a href="logout.php">Logout</a></li>

            </ul>
        </div>
        
        <ul class="navigation">            
            <li class="active">
                <a href="?p=home">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="?p=carabeli">
                    <span class="isw-list"></span><span class="text">Cara Pembelian</span>
                </a>
            </li> 
            <li>
                <a href="?p=gantipassword">
                    <span class="isw-list"></span><span class="text">Ganti Password</span>
                </a>
            </li>
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Manajemen Produk</span>
                </a>
                <ul>
                    <li>
                        <a href="?p=produk">
                            <span class="icon-th"></span><span class="text">Produk</span>
                        </a>                  
                    </li> 
                    <li>
                        <a href="?p=subproduk">
                            <span class="icon-th"></span><span class="text">Sub Produk</span>
                        </a>                  
                    </li>         
                    <li>
                        <a href="?p=kategori">
                            <span class="icon-th-large"></span><span class="text">Kategori</span>
                        </a>                  
                    </li>                     
                    <li>
                        <a href="?p=jasakirim">
                            <span class="icon-plane"></span><span class="text">Jasa Pengiriman</span>
                        </a>                  
                    </li> 
                    <li>
                        <a href="?p=ongkoskirim">
                            <span class="icon-check"></span><span class="text">Ongkos Kirim</span>
                        </a>                  
                    </li>                    
                </ul>                
            </li> 
            <li  class="openable">
                <a href="#">
                    <span class="isw-archive"></span><span class="text">Modul Admin</span>                 
                </a>
                 <ul>
                    <li>
                        <a href="?p=ym">
                            <span class="icon-user"></span><span class="text">Custumer Online</span>
                        </a>                  
                    </li>
                    <li>
                        <a href="?p=bank">
                            <span class="icon-refresh"></span><span class="text">Rekening Bank</span>
                        </a>
                    </li>    
                    <li>
                        <a href="?p=banner">
                            <span class="icon-resize-vertical"></span><span class="text">Link Terkait</span>
                        </a>                  
                    </li>                                          
                </ul>    
            </li>                        
            <li class="openable">
                <a href="#">
                    <span class="isw-chat"></span><span class="text">Komentar</span>
                </a>
               <ul>
                    <li> 
                        <a href="?p=komentar">
                            <span class="icon-comment"></span><span class="text">Komentar</span>
                        </a>
                	</li>
                    <li> 
                        <a href="?p=pesan">
                            <span class="icon-comment"></span><span class="text">Pesan</span>
                        </a>
                	</li>
                </ul>
            </li>
             <li  class="openable">
                <a href="#">
                    <span class="isw-archive"></span><span class="text">Menu Transaksi</span>                 
                </a>
                 <ul>
                    <li>
                        <a href="?p=order">
                            <span class="icon-shopping-cart"></span><span class="text">Order Masuk</span>
                        </a>                  
                    </li>
                    <li>
                        <a href="?p=laptrans">
                            <span class="icon-folder-close"></span><span class="text">Lap Transaksi</span>
                        </a>
                    </li>  
                </ul>    
            </li>                                    
        </ul>
</body>
</html>