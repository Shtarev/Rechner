<?php session_start();?>
<html lang="de">
<header>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all and (orientation:portrait)" href="file/portrait.css">
    <link rel="stylesheet" media="all and (orientation:landscape)" href="file/landscape.css">
    <title>Online Rechner Demo 2018</title>
</header>

<body>
    <?php
    if ( isset( $_POST[ 'ResetKnopf' ] ) ) {
        $eingabe = $_POST[ 'ResetKnopf' ];
    }
    if ( isset( $_POST[ 'LoschenKnopf' ] ) ) {
        $eingabe = $_POST[ 'LoschenKnopf' ];
    }

    if ( isset( $_POST[ 'PlusKnopf' ] ) ) {
        $eingabe = $_POST[ 'PlusKnopf' ];
    }
    if ( isset( $_POST[ 'MinusKnopf' ] ) ) {
        $eingabe = $_POST[ 'MinusKnopf' ];
    }
    if ( isset( $_POST[ 'MultiplizierenKnopf' ] ) ) {
        $eingabe = $_POST[ 'MultiplizierenKnopf' ];
    }
    if ( isset( $_POST[ 'TeilenKnopf' ] ) ) {
        $eingabe = $_POST[ 'TeilenKnopf' ];
    }

    if ( isset( $_POST[ 'null' ] ) ) {
        $eingabe = $_POST[ 'null' ];
    }
    if ( isset( $_POST[ 'ein' ] ) ) {
        $eingabe = $_POST[ 'ein' ];
    }
    if ( isset( $_POST[ 'zwei' ] ) ) {
        $eingabe = $_POST[ 'zwei' ];
    }
    if ( isset( $_POST[ 'drei' ] ) ) {
        $eingabe = $_POST[ 'drei' ];
    }
    if ( isset( $_POST[ 'vier' ] ) ) {
        $eingabe = $_POST[ 'vier' ];
    }
    if ( isset( $_POST[ 'fuenf' ] ) ) {
        $eingabe = $_POST[ 'fuenf' ];
    }
    if ( isset( $_POST[ 'sechs' ] ) ) {
        $eingabe = $_POST[ 'sechs' ];
    }
    if ( isset( $_POST[ 'sieben' ] ) ) {
        $eingabe = $_POST[ 'sieben' ];
    }
    if ( isset( $_POST[ 'acht' ] ) ) {
        $eingabe = $_POST[ 'acht' ];
    }
    if ( isset( $_POST[ 'neun' ] ) ) {
        $eingabe = $_POST[ 'neun' ];
    }
    if ( isset( $_POST[ 'comma' ] ) ) {
        $eingabe = $_POST[ 'comma' ];
    }
    if ( isset( $_POST[ 'gleich' ] ) ) {
        $eingabe = $_POST[ 'gleich' ];
    }

    if ( isset( $_SESSION[ 'anzeige' ] ) ) {
        $anzeige = $_SESSION[ 'anzeige' ];
    }
    if ( isset( $_SESSION[ 'timing' ] ) ) {
        $timing = $_SESSION[ 'timing' ];
    }
    if ( isset( $_SESSION[ 'archiv' ] ) ) {
        $archiv = $_SESSION[ 'archiv' ];
    }
    if ( isset( $_SESSION[ 'loschen' ] ) ) {
        $loschen = $_SESSION[ 'loschen' ];
    }
    if ( isset( $_POST[ 'delitearchiv' ] ) ) {
        $_SESSION[ 'archiv' ] = $archiv = "";
    }

    if ( $eingabe == "C" ) {
        if ( isset( $_SESSION[ 'anzeige' ] ) ) {
            $_SESSION[ 'anzeige' ] = $anzeige = "";
        }
        if ( isset( $_SESSION[ 'timing' ] ) ) {
            $_SESSION[ 'timing' ] = $timing = "";
        }
        unset( $eingabe );
    }
    if ( $eingabe == "<<<" ) {
        unset( $eingabe );
        if ( !empty( $anzeige ) ) {
            if ( $loschen == true || 
			     $anzeige {strlen( $anzeige ) - 1} == "+" || 
				 $anzeige {strlen( $anzeige ) - 1} == "-" || 
				 $anzeige {strlen( $anzeige ) - 1} == "x" || 
				 $anzeige {strlen( $anzeige ) - 1} == ":" ) 
			{
                 unset( $eingabe );
            } 
			else {
                $anzeige = substr( $anzeige, 0, -1 );
                $timing = substr( $timing, 0, -1 );
            }
            $_SESSION[ 'anzeige' ] = $anzeige;
            $_SESSION[ 'timing' ] = $timing;
        }
    }
    if ( $eingabe == "+" || $eingabe == "-" || $eingabe == "x" || $eingabe == ":" ) {
        if($anzeige == "-" and $eingabe == "-"){$eingabe = "";}
        if ( !empty( $anzeige ) ) {
            if ( $anzeige {strlen( $anzeige ) - 1} == "." ) {
                unset( $eingabe );
            }
            if ( $loschen == true ) {
                $anzeige = $anzeige . $eingabe;
                $timing = $anzeige;
                $_SESSION[ 'loschen' ] = $loschen = false;
            }
            if ( substr_count( $anzeige, "+" ) > 0 || substr_count( $anzeige, "-" ) > 0 || substr_count( $anzeige, "x" ) > 0 || substr_count( $anzeige, ":" ) > 0 ) {
                if ( $anzeige {strlen( $anzeige ) - 1} == "+" || 
					 $anzeige {strlen( $anzeige ) - 1} == "-" || 
					 $anzeige {strlen( $anzeige ) - 1} == "x" || 
					 $anzeige {strlen( $anzeige ) - 1} == ":" ) 
				{
                    if ( strlen( $anzeige ) == 1 ) {
                        unset( $eingabe );
                    } 
					else {
                        $anzeige = substr( $anzeige, 0, -1 ) . $eingabe;
                        $timing = substr( $timing, 0, -1 ) . $eingabe;
                    }
                } 
				else {
                    if ( $anzeige {0} == "-" ) {
                        if ( substr_count( $anzeige, "+" ) > 0 || substr_count( $anzeige, "-" ) > 1 || substr_count( $anzeige, "x" ) > 0 || substr_count( $anzeige, ":" ) > 0 ) {
                            $anzeige = substr( $anzeige, 1 );
                            if ( substr_count( $anzeige, "+" ) > 0 ) {
                                $sposob = "+";
                            }
                            if ( substr_count( $anzeige, "-" ) > 0 ) {
                                $sposob = "-";
                            }
                            if ( substr_count( $anzeige, "x" ) > 0 ) {
                                $sposob = "x";
                            }
                            if ( substr_count( $anzeige, ":" ) > 0 ) {
                                $sposob = ":";
                            }
                            switch ( $sposob ) {
                                case "+":
                                    $anzeige = explode( "+", $anzeige );
                                    $anzeige = -$anzeige[ 0 ] + $anzeige[ 1 ];
                                    $anzeige = $anzeige . $eingabe;
                                    $timing = $timing . $eingabe;
                                    break;
                                case "-":
                                    $anzeige = explode( "-", $anzeige );
                                    $anzeige = -$anzeige[ 0 ] - $anzeige[ 1 ];
                                    $anzeige = $anzeige . $eingabe;
                                    $timing = $timing . $eingabe;
                                    break;
                                case "x":
                                    $anzeige = explode( "x", $anzeige );
                                    $anzeige = -$anzeige[ 0 ] * $anzeige[ 1 ];
                                    $anzeige = $anzeige . $eingabe;
                                    $timing = $timing . $eingabe;
                                    break;
                                case ":":
                                    $anzeige = explode( ":", $anzeige );
                                    $anzeige = -$anzeige[ 0 ] / $anzeige[ 1 ];
                                    $anzeige = $anzeige . $eingabe;
                                    $timing = $timing . $eingabe;
                                    break;
                            }
                        } 
						else {
                            if ( strlen( $anzeige ) > 1 ) {
                                $_SESSION[ 'anzeige' ] = $anzeige = $anzeige . $eingabe;
                                $_SESSION[ 'timing' ] = $timing = $timing . $eingabe;
                            }
                        }
                    } 
					else {
                        if ( substr_count( $anzeige, "+" ) > 0 ) {
                            $sposob = "+";
                        }
                        if ( substr_count( $anzeige, "-" ) > 0 ) {
                            $sposob = "-";
                        }
                        if ( substr_count( $anzeige, "x" ) > 0 ) {
                            $sposob = "x";
                        }
                        if ( substr_count( $anzeige, ":" ) > 0 ) {
                            $sposob = ":";
                        }
                        switch ( $sposob ) {
                            case "+":
                                $anzeige = explode( "+", $anzeige );
                                $anzeige = $anzeige[ 0 ] + $anzeige[ 1 ];
                                $anzeige = $anzeige . $eingabe;
                                $timing = $timing . $eingabe;
                                break;
                            case "-":
                                $anzeige = explode( "-", $anzeige );
                                $anzeige = $anzeige[ 0 ] - $anzeige[ 1 ];
                                $anzeige = $anzeige . $eingabe;
                                $timing = $timing . $eingabe;
                                break;
                            case "x":
                                $anzeige = explode( "x", $anzeige );
                                $anzeige = $anzeige[ 0 ] * $anzeige[ 1 ];
                                $anzeige = $anzeige . $eingabe;
                                $timing = $timing . $eingabe;
                                break;
                            case ":":
                                $anzeige = explode( ":", $anzeige );
                                $anzeige = $anzeige[ 0 ] / $anzeige[ 1 ];
                                $anzeige = $anzeige . $eingabe;
                                $timing = $timing . $eingabe;
                                break;
                        }
                    }
                }
            } 
			else {
                if ( $loschen == true ) {
                    $anzeige = $anzeige . $eingabe;
                    $timing = $anzeige;
                    $_SESSION[ 'loschen' ] = $loschen = false;
                } 
				else {
                    $anzeige = $anzeige . $eingabe;
                    $timing = $timing . $eingabe;
                }
            }
            $_SESSION[ 'anzeige' ] = $anzeige;
            $_SESSION[ 'timing' ] = $timing;
        } 
		else {
            if ( $eingabe == "+" || $eingabe == "x" || $eingabe == ":" ) {
                unset( $eingabe );
            }
            if ( $eingabe == "-" ) {
                $_SESSION[ 'anzeige' ] = $anzeige = $eingabe;
                $_SESSION[ 'timing' ] = $timing = $eingabe;
            }
        }
    }
    if ( $eingabe == "0" || $eingabe == 1 || $eingabe == 2 || $eingabe == 3 || $eingabe == 4 || $eingabe == 5 || $eingabe == 6 || $eingabe == 7 || $eingabe == 8 || $eingabe == 9 ) {
        if ( !empty( $anzeige ) ) {
            if ( $loschen == true && $anzeige {0} != "-" ) {
                $_SESSION[ 'loschen' ] = $loschen = false;
                $anzeige = $eingabe;
                $timing = $eingabe;
            } 
			else {
                if ( strlen( $anzeige ) > 1 && $anzeige {
                        strlen( $anzeige ) - 1
                    } == "0" ) {
                    if ( $anzeige {strlen( $anzeige ) - 2} == "+" || 
					     $anzeige {strlen( $anzeige ) - 2} == "-" || 
						 $anzeige {strlen( $anzeige ) - 2} == "x" || 
						 $anzeige {strlen( $anzeige ) - 2} == ":" ) 
					{
                         unset( $eingabe );
                    } else {
                        $anzeige = $anzeige . $eingabe;
                        $timing = $timing . $eingabe;
                    }
                } 
				else {
                    $anzeige = $anzeige . $eingabe;
                    $timing = $timing . $eingabe;
                }
            }
        } 
		else {
            $anzeige = $eingabe;
            $timing = $eingabe;
        }
        $_SESSION[ 'anzeige' ] = $anzeige;
        $_SESSION[ 'timing' ] = $timing;
    }
    if ( $eingabe == "=" ) {
        if ( !empty( $anzeige ) ) {
            if ( substr_count( $anzeige, "+" ) > 0 || substr_count( $anzeige, "-" ) > 0 || substr_count( $anzeige, "x" ) > 0 || substr_count( $anzeige, ":" ) > 0 ) {
                if ( $anzeige {strlen( $anzeige ) - 1} == "." || 
					 $anzeige {strlen( $anzeige ) - 1} == "+" || 
					 $anzeige {strlen( $anzeige ) - 1} == "-" || 
					 $anzeige {strlen( $anzeige ) - 1} == "x" || 
					 $anzeige {strlen( $anzeige ) - 1} == ":" ) 
				{
                     $eingabe == "";
                } 
				else {
                    if ( $anzeige < 0 ) {
                        if ( substr_count( $anzeige, "+" ) > 0 || substr_count( $anzeige, "-" ) > 1 || substr_count( $anzeige, "x" ) > 0 || substr_count( $anzeige, ":" ) > 0 ) {
                            $anzeige = substr( $anzeige, 1 );
                            if ( substr_count( $anzeige, "+" ) > 0 ) {
                                $sposob = "+";
                            }
                            if ( substr_count( $anzeige, "-" ) > 0 ) {
                                $sposob = "-";
                            }
                            if ( substr_count( $anzeige, "x" ) > 0 ) {
                                $sposob = "x";
                            }
                            if ( substr_count( $anzeige, ":" ) > 0 ) {
                                $sposob = ":";
                            }
                            switch ( $sposob ) {
                                case "+":
                                    $anzeige = explode( "+", $anzeige );
                                    $anzeige = -$anzeige[ 0 ] + $anzeige[ 1 ];
                                    break;
                                case "-":
                                    $anzeige = explode( "-", $anzeige );
                                    $anzeige = -$anzeige[ 0 ] - $anzeige[ 1 ];
                                    break;
                                case "x":
                                    $anzeige = explode( "x", $anzeige );
                                    $anzeige = -$anzeige[ 0 ] * $anzeige[ 1 ];
                                    break;
                                case ":":
                                    $anzeige = explode( ":", $anzeige );
                                    $anzeige = -$anzeige[ 0 ] / $anzeige[ 1 ];
                                    break;
                            }
                            $_SESSION[ 'archiv' ] = $archiv = $archiv . $timing . "=" . $anzeige . "<br>";
                        }
                    } 
					else {
                        if ( substr_count( $anzeige, "+" ) > 0 ) {
                            $sposob = "+";
                        }
                        if ( substr_count( $anzeige, "-" ) > 0 ) {
                            $sposob = "-";
                        }
                        if ( substr_count( $anzeige, "x" ) > 0 ) {
                            $sposob = "x";
                        }
                        if ( substr_count( $anzeige, ":" ) > 0 ) {
                            $sposob = ":";
                        }
                        switch ( $sposob ) {
                            case "+":
                                $anzeige = explode( "+", $anzeige );
                                $anzeige = $anzeige[ 0 ] + $anzeige[ 1 ];
                                break;
                            case "-":
                                $anzeige = explode( "-", $anzeige );
                                $anzeige = $anzeige[ 0 ] - $anzeige[ 1 ];
                                break;
                            case "x":
                                $anzeige = explode( "x", $anzeige );
                                $anzeige = $anzeige[ 0 ] * $anzeige[ 1 ];
                                break;
                            case ":":
                                $anzeige = explode( ":", $anzeige );
                                $anzeige = $anzeige[ 0 ] / $anzeige[ 1 ];
                                break;
                        }
                        $_SESSION[ 'archiv' ] = $archiv = $archiv . $timing . "=" . $anzeige . "<br>";
                    }
                    $_SESSION[ 'anzeige' ] = $anzeige;
                    $_SESSION[ 'timing' ] = $timing = $anzeige;
                    $_SESSION[ 'loschen' ] = true;
                }
            }
        }
    }
    if ( $eingabe == "." ) {
        if ( $loschen == true ) {
            unset( $eingabe );
        } 
		else {
            if ( empty( $anzeige ) ) {
                $anzeige = "0.";
            }
            if ( $anzeige {strlen( $anzeige ) - 1} == "." || 
				 $anzeige {strlen( $anzeige ) - 1} == "+" || 
				 $anzeige {strlen( $anzeige ) - 1} == "-" || 
				 $anzeige {strlen( $anzeige ) - 1} == "x" || 
				 $anzeige {strlen( $anzeige ) - 1} == ":" ) 
			{
                 unset( $eingabe );
            }
            if ( strpos( $anzeige, $eingabe ) == true ) {
                $_SESSION[ 'loschen' ] = $loschen = false;
                if ( substr_count( $anzeige, $eingabe ) == 2 ) {
                    unset( $eingabe );
                } 
				else {
                    if ( $anzeige {strlen( $anzeige ) - 1} == "." ) {
                        unset( $eingabe );
                    }
                    if ( substr_count( $anzeige, "+" ) == 1 || substr_count( $anzeige, "x" ) == 1 || substr_count( $anzeige, ":" ) == 1 ) {
                        if ( substr_count( $anzeige, "+" ) == 1 ) {
                            if ( substr_count( strrchr( $anzeige, "+" ), $eingabe ) == 1 ) {
                                unset( $eingabe );
                            } 
							else {
                                $anzeige = $anzeige . $eingabe;
                                $timing = $timing . $eingabe;
                            }
                        } 
						elseif ( substr_count( $anzeige, "x" ) == 1 ) {
                            if ( substr_count( strrchr( $anzeige, "x" ), $eingabe ) == 1 ) {
                                unset( $eingabe );
                            } 
							else {
                                $anzeige = $anzeige . $eingabe;
                                $timing = $timing . $eingabe;
                            }
                        }
                        elseif ( substr_count( $anzeige, ":" ) == 1 ) {
                            if ( substr_count( strrchr( $anzeige, ":" ), $eingabe ) == 1 ) {
                                unset( $eingabe );
                            } 
							else {
                                $anzeige = $anzeige . $eingabe;
                                $timing = $timing . $eingabe;
                            }
                        }
                    }
                    if ( substr_count( $anzeige, "-" ) == 2 ) {
                        if ( substr_count( strrchr( $anzeige, "-" ), $eingabe ) == 1 ) {
                            unset( $eingabe );
                        } 
						else {
                            $anzeige = $anzeige . $eingabe;
                            $timing = $timing . $eingabe;
                        }
                    }
                    if ( substr_count( $anzeige, "-" ) == 1 ) {
                        if ( $anzeige {0} == "-" ) {
                            unset( $eingabe );
                        } 
						else {
                            if ( substr_count( strrchr( $anzeige, "-" ), $eingabe ) == 1 ) {
                                unset( $eingabe );
                            } 
							else {
                                $anzeige = $anzeige . $eingabe;
                                $timing = $timing . $eingabe;
                            }
                        }
                    }
                }
            } 
			else {
                $anzeige = $anzeige . $eingabe;
                $timing = $timing . $eingabe;
            }
            $_SESSION[ 'anzeige' ] = $anzeige;
            $_SESSION[ 'timing' ] = $timing;
        }
    }
    ?>
    <div id="Aussengrenze">
        <div id="Tafel">
            <?= $anzeige; ?>
        </div>
        <form method="post" action="rechner.php">
            <input type="submit" class="gross" name="ResetKnopf" id="ResetKnopf" value="C">
            <input type="submit" class="gross" name="PlusKnopf" id="PlusKnopf" value="+">
            <input type="submit" class="gross" name="MinusKnopf" id="MinusKnopf" value="-">
            <input type="submit" class="gross" name="LoschenKnopf" id="LoschenKnopf" value="<<<">
            <input type="submit" class="gross" name="MultiplizierenKnopf" id="MultiplizierenKnopf" value="x">
            <input type="submit" class="gross" name="TeilenKnopf" id="TeilenKnopf" value=":">
            <input type="submit" class="klein" name="null" id="null" value="0">
            <input type="submit" class="klein" name="ein" id="ein" value="1">
            <input type="submit" class="klein" name="zwei" id="zwei" value="2">
            <input type="submit" class="klein" name="drei" id="drei" value="3">
            <input type="submit" class="klein" name="vier" id="vier" value="4">
            <input type="submit" class="klein" name="fuenf" id="fuenf" value="5">
            <input type="submit" class="klein" name="sechs" id="sechs" value="6">
            <input type="submit" class="klein" name="sieben" id="sieben" value="7">
            <input type="submit" class="klein" name="acht" id="acht" value="8">
            <input type="submit" class="klein" name="neun" id="neun" value="9">
            <input type="submit" class="klein" name="comma" id="comma" value=".">
            <input type="submit" class="klein" name="gleich" id="gleich" value="=">
        </form>
    </div>
    <div id="Archiv">
        <form method="post" action="rechner.php">
            <?php 
          if (!empty ($archiv))
          {
			  echo "<input type=\"submit\" class=\"gross\" id=\"grossArchiv\" name=\"delitearchiv\" value=\"Archiv löschen\"><hr>";
          }
          echo "<b>".$timing."</b><br>".$archiv; 
          ?>
        </form>
        <footer>Copyright © 2010
            <script>
                new Date().getFullYear() > 2010 && document.write( "-" + new Date().getFullYear() );
            </script> | All rights reserved | Design & programmierung by <a href="https://www.netzexplorer.com">Andrey Shtarev</a>
        </footer>
    </div>
</body>
</html>