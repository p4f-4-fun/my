############################
##------------------------##
##---Tic-Tac-Toe-TEXT-V1--##
##----------by P4F--------##
##------------------------##
##-Ver:-Python-2.7--------##
##-Coding:-UTF-8----------##
##------------------------##
############################
############################
import os 		   #### <--- lib used to clearing console window
import random	   #### <--- lib used to random numbers in game
import time		   #### <--- lib used to time delay
random.seed()	   #### <--- initialization of imported 'random' lib

############################# Array and VAR's #############################
_GameArray = ['1', '2', '3',
			  '4', '5', '6',
			  '7', '8', '9']
global _NowPlay
_NowPlay = ''
global _WIN
_WIN = False
global _AvgX
_AvgX = 0
global _AvgO
_AvgO = 0
global _PointsX_Player
_PointsX_Player = 0
global _PointsO_Player
_PointsO_Player = 0
global _gameCounter
_gameCounter = 0
global _PlayerX
_PlayerX = 'X'
global _PlayerO
_PlayerO = 'O'
global _acceptChangePlayer
_acceptChangePlayer = False
global _remis__SpotCounter
_remis__SpotCounter = 0
global _drawsCounter
_drawsCounter = 0

############################# BEGIN OF DEFS #############################
def drawGamePlatform():
	print '  -------------'
	print '  |', _GameArray[0], '|', _GameArray[1], '|', _GameArray[2], '|'
	print '  -------------'
	print '  |', _GameArray[3], '|', _GameArray[4], '|', _GameArray[5], '|'
	print '  -------------'
	print '  |', _GameArray[6], '|', _GameArray[7], '|', _GameArray[8], '|'
	print '  -------------'

def RandomPlayer():
	global _NowPlay
	
	######## Random player on start game ########
	_randomPlayer = random.randint(1, 2015)
	if _randomPlayer%2 == 0:
		_NowPlay = _PlayerX
	else:
		_NowPlay = _PlayerO
	
def checkTheWin(_NowPlaySign):
	global _WIN
	
	########				Horizontal					########
	if _GameArray[0] == _NowPlaySign and _GameArray[1] == _NowPlaySign and _GameArray[2] == _NowPlaySign:
		_WIN = True
	elif _GameArray[3] == _NowPlaySign and _GameArray[4] == _NowPlaySign and _GameArray[5] == _NowPlaySign:
		_WIN = True
	elif _GameArray[6] == _NowPlaySign and _GameArray[7] == _NowPlaySign and _GameArray[8] == _NowPlaySign:
		_WIN = True
	
	########				 Vertical					########
	elif _GameArray[0] == _NowPlaySign and _GameArray[3] == _NowPlaySign and _GameArray[6] == _NowPlaySign:
		_WIN = True
	elif _GameArray[1] == _NowPlaySign and _GameArray[4] == _NowPlaySign and _GameArray[7] == _NowPlaySign:
		_WIN = True
	elif _GameArray[2] == _NowPlaySign and _GameArray[5] == _NowPlaySign and _GameArray[8] == _NowPlaySign:
		_WIN = True
	
	########				 Diagonal					########
	elif _GameArray[0] == _NowPlaySign and _GameArray[4] == _NowPlaySign and _GameArray[8] == _NowPlaySign:
		_WIN = True
	elif _GameArray[2] == _NowPlaySign and _GameArray[4] == _NowPlaySign and _GameArray[6] == _NowPlaySign:
		_WIN = True
	else:
		_WIN = False

def whileNextGame():
	while True:
		choos = raw_input('\n\n-----------\n> Play again? [Y/N]: ')
		if str(choos) == 'y' or str(choos) == 'Y':
			RandomPlayer()
			newGame()
			break
		elif str(choos) == 'n' or str(choos) == 'N':
			os.system('cls')
			print '---------------------\n> Bye! Welcome back! :)\n'
			quit()
			
def printToWinPlayer():
	global _NowPlay
	global _WIN
	global _AvgX
	global _AvgO
	global _PointsX_Player
	global _PointsO_Player
	global _gameCounter
	global _acceptChangePlayer
	global _remis__SpotCounter
	global _drawsCounter
	
	######## WIN MATCH ########
	if _WIN == True:
		print '\n\n> ~~ The winner is:', _NowPlay, ' ~~<'
		if _NowPlay == _PlayerX:
			_PointsX_Player += 1
		else:
			_PointsO_Player += 1
		
		######## POINTS ADDING ########
		_gameCounter += 1
		if _gameCounter >= 1:
			_AvgX = round(((float(_PointsX_Player) / float(_gameCounter - _drawsCounter)) * 100), 1)
			_AvgO = round(((float(_PointsO_Player) / float(_gameCounter - _drawsCounter)) * 100), 1)
		
		######## NEXT GAME PROMPT ########
		whileNextGame()
	
	######## Draw ########
	elif _WIN == False and _remis__SpotCounter == 9:
		_drawsCounter += 1
		_gameCounter += 1
		print '\n-----------\n> Draw! :) Nobody\'s won!\n' 
		whileNextGame()
		
	######## Game in progress ########
	elif _WIN == False:
		######## CHANGE PLAYER ########
		if _acceptChangePlayer == True:
			if _NowPlay == _PlayerX:
				_NowPlay = _PlayerO
			else:
				_NowPlay = _PlayerX
	######## Optional else - protection before undefined app behavior :) ########
	else:
		quit()
		
def newGame():
	global _WIN
	global _remis__SpotCounter
	
	######## Reset game array to start game moment ########
	for k in range(0,9):
		_GameArray[k] = str(k+1)
	
	######## Reset game vars need to good logic work ######	
	_WIN = False
	_remis__SpotCounter = 0
	
############################## END OF DEFS ##############################
		
######## START PLAYER - SIGN ########
RandomPlayer()
				
############################## MAIN LOOP ################################		
while True:
	os.system('cls')
	
	######## Drawing and input + validation ########
	print '\n*====================*'
	print '|       Points       |'
	print '*====================*'
	print '| Number of game:', _gameCounter + 1
	print '|--------------------'
	print '| Player X:', _PointsX_Player
	print '| Player O:', _PointsO_Player
	print '| Draws   :', _drawsCounter
	print '| AvgX    :', _AvgX, '\b%'
	print '| AvgO    :', _AvgO, '\b%', '\n \____________________\n\n'
	
	drawGamePlatform()
	
	print '\n( ---> ', _NowPlay, ' <--- )'
	while True:
		input = raw_input('-----------------\n#Move to: ')
		if str(input) == '':
			print '> You got me empty field?! ;/ --> dafuq?!'
			time.sleep(1)
		elif str(input) != '1' and str(input) != '2' and str(input) != '3' and str(input) != '4' and str(input) != '5' and str(input) != '6' and str(input) != '7' and str(input) != '8' and str(input) != '9':
			print '> Error[bad input value] <-- use only numbers values [FROM 1 TO 9].'
			time.sleep(1)
		else:
			break
	
	if str(_GameArray[int(input)-1]) != 'X' and str(_GameArray[int(input)-1]) != 'O':
		_GameArray[int(input)-1] = _NowPlay
		_acceptChangePlayer = True
		_remis__SpotCounter += 1
	else:
		print '> This spot was taken!'
		_acceptChangePlayer = False
		time.sleep(1)
		os.system('cls')
		
	checkTheWin(_NowPlay)
	printToWinPlayer()
	time.sleep(0.1)
