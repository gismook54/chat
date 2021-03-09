
<nav id="sidebar">
<div class="sidebar-content">

    <div class="content-header content-header-fullrow mb-20">
        <div class="content-header-section sidebar-mini-visible-b">
            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                <span class="text-dual-primary-dark">C</span><span class="text-success">F</span>
            </span>
        </div>
        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                <i class="fa fa-times text-danger"></i>
            </button>
            <div class="content-header-item">
                <a class="font-w700" href="./">
                <img src="../assets/media/favicons/logotipo_forester.png" width="60"  alt=""/> </a>
            </div>
        </div>
    </div>

    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li><a class="<?php if($menu == '0'){ echo 'active';}; ?>" href="./"><i class="si si-home"></i>Escritorio</a></li>
            <li class="open">
                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bubbles"></i><span class="sidebar-mini-hide">Chat</span></a>
                <ul >
                    <?php
                    $elalumno = $_SESSION['grupo_alumno'];
                    
                           switch ($elalumno){
                                    case 1:
                                        echo '<li><a href="chat/all/chats.php?id=1">Teresita Nava Bola&nacute;os</a></li>';
                                        break;
                                    case 2:
                                        echo '<li><a href="chat/all/chats.php?id=2">Guadalupe Fuentes Guti&eacute;rrez</a></li>';
                                        break;
                                    case 3:
                                        echo '<li><a href="chat/all/chats.php?id=19">MIRIAM ALETIA GARCIA ESTARDA</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=20">REINA AURORA CUEVAS PICHARDO</a></li>';
                                        break;
                                    case 4:
                                        echo '<li><a href="chat/all/chats.php?id=19">MIRIAM ALETIA GARCIA ESTARDA</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=20">REINA AURORA CUEVAS PICHARDO</a></li>';
                                        break;
                                    case 5:
                                        echo '<li><a href="chat/all/chats.php?id=19">MIRIAM ALETIA GARCIA ESTARDA</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=20">REINA AURORA CUEVAS PICHARDO</a></li>';
                                        break;
                                    case 6:
                                        echo '<li><a href="chat/all/chats.php?id=21">MIRNA GABRIELA ALVAREZ SANCHEZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=22">BELEM FUENTES GUTIERREZ</a></li>';
                                        break;
                                    case 7:
                                        echo '<li><a href="chat/all/chats.php?id=21">MIRNA GABRIELA ALVAREZ SANCHEZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=22">BELEM FUENTES GUTIERREZ</a></li>';
                                        break;
                                    case 8:
                                        echo '<li><a href="chat/all/chats.php?id=21">MIRNA GABRIELA ALVAREZ SANCHEZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=22">BELEM FUENTES GUTIERREZ</a></li>';
                                        break;
                                    case 9:
                                        echo '<li><a href="chat/all/chats.php?id=23">GUADALUPE FUENTES GUTIERREZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=24">LUCIA RENEE MARTINEZ LUGO</a></li>';
                                        break;
                                    case 10:
                                        echo '<li><a href="chat/all/chats.php?id=23">GUADALUPE FUENTES GUTIERREZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=24">LUCIA RENEE MARTINEZ LUGO</a></li>';
                                        break;
                                    case 11:
                                        echo '<li><a href="chat/all/chats.php?id=23">GUADALUPE FUENTES GUTIERREZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=24">LUCIA RENEE MARTINEZ LUGO</a></li>';
                                        break;
                                    case 12:
                                        echo '<li><a href="chats.php?id=6">Mar&iacute;a Guadalupe Atilano Bautista</a></li>';
                                        break;
                                    case 13:
                                        echo '<li><a href="chats.php?id=6">Mar&iacute;a Guadalupe Atilano Bautista</a></li>';
                                        break;
                                    case 14:
                                        echo '<li><a href="chats.php?id=6">Mar&iacute;a Guadalupe Atilano Bautista</a></li>';
                                        break;
                                    case 15:
                                        echo '<li><a href="chat/all/chats.php?id=25">LILIA ADRIANA LOPEZ BENITEZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=26">LAURA ALEJANDRA ESTRADA VAZQUEZ</a></li>';
                                        break;
                                    case 16:
                                        echo '<li><a href="chat/all/chats.php?id=25">LILIA ADRIANA LOPEZ BENITEZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=26">LAURA ALEJANDRA ESTRADA VAZQUEZ</a></li>';
                                        break;
                                    case 17:
                                        echo '<li><a href="chat/all/chats.php?id=25">LILIA ADRIANA LOPEZ BENITEZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=26">LAURA ALEJANDRA ESTRADA VAZQUEZ</a></li>';
                                        break;
                                    case 21:
                                        echo '<li><a href="chat/all/chats.php?id=27">ELIZABETH UBALDO CARDOSO</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=28">ALMENDRA ISABEL MURILLO GUERRERO</a></li>';
                                        break;
                                     case 22:
                                        echo '<li><a href="chat/all/chats.php?id=27">ELIZABETH UBALDO CARDOSO</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=28">ALMENDRA ISABEL MURILLO GUERRERO</a></li>';
                                        break;
                                     case 23:
                                        echo '<li><a href="chat/all/chats.php?id=27">ELIZABETH UBALDO CARDOSO</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=28">ALMENDRA ISABEL MURILLO GUERRERO</a></li>';
                                        break;
                                     case 24:
                                        echo '<li><a href="chat/all/chats.php?id=29">ALMA OFELIA QUINTANA FLORES</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=30">GABRIELA HERNANDEZ GUTIERREZ</a></li>';
                                        break;
                                    case 25:
                                        echo '<li><a href="chat/all/chats.php?id=29">ALMA OFELIA QUINTANA FLORES</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=30">GABRIELA HERNANDEZ GUTIERREZ</a></li>';
                                        break;
                                    case 26:
                                        echo '<li><a href="chat/all/chats.php?id=29">ALMA OFELIA QUINTANA FLORES</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=30">GABRIELA HERNANDEZ GUTIERREZ</a></li>';
                                        break;
                                    case 27:
                                        echo '<li><a href="chat/all/chats.php?id=31">MARIA DE LOURDES RAMIREZ RUIZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=32">AIDA INDA RODRIGUEZ</a></li>';
                                        break;
                                    case 28:
                                        echo '<li><a href="chat/all/chats.php?id=31">MARIA DE LOURDES RAMIREZ RUIZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=32">AIDA INDA RODRIGUEZ</a></li>';
                                        break;
                                    case 29:
                                        echo '<li><a href="chat/all/chats.php?id=31">MARIA DE LOURDES RAMIREZ RUIZ</a></li>';
                                        echo '<li><a href="chat/all/chats.php?id=32">AIDA INDA RODRIGUEZ</a></li>';
                                        break;

                                }
                        
                        
                    
                       
                      ?>
                    
                 
                    
                </ul>
            </li>
            <li><a class="<?php if($menu == '0'){ echo 'active';}; ?>" href="../logout.php"><i class="si si-logout"></i>Salir</a></li>
        </ul>
    </div>

</div>
</nav>