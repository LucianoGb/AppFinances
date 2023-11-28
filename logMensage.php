<?php
date_default_timezone_set('America/Maceio');
function logMensage ( $msg, $level = 'info', $file = __DIR__.'/log.txt')
		{
			// Armazena nível do log (INFO, WARNING ou ERROR)
			$levelStr = '';

			switch ($level)
			{
				case 'info':
					$levelStr = 'INFO';
					break;
				case 'login':
					$levelStr = 'LOGIN';
					break;
				
				case 'warning':
					$levelStr = 'WARNING';
					break;
				
				case 'error':
					$levelStr = "ERROR";
					 break;
			}
			$date = date('d-m-Y H:i:s');
			$msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL );
			
			file_put_contents( $file, $msg, FILE_APPEND );
		
		}