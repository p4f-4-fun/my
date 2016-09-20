/* Tic Tac Toe by P4F *
**  v1 - 18.04.2015r  *
**  v2 - 28.11.2015r  *
** ---- JScript ----- */

// Przypisanie funkcji, która wyrzuca metode getElementById z obiektu document po czym przypisuje
// do zmiennej  $  dzięki, której później szybciej i łatwiej, a przede wszystkim w krótszy sposób
// można korzystać z obiektu DOM, gdyż chcąc nadpisać wartość z jakiegoś elemntu wystarczy 
// wpisać np.: " $('foo').innerHTML" zamiast "document.getElementById('foo').innerHTML"
$ = function(id) { 
	return document.getElementById(id); 
}
/* =============================================================================== */
/* ------------------------------- KONTENT GRY ----------------------------------- */

// Losowanie randomowe gracza, a następnie sprawdzenie czy liczba jest podzielna przez 2 bez reszty
// czyli sprawdzanie jej parzystości po prostu. Jeżeli jest podzielna bez reszty to startSign = 0 czyli zaczyna X [krzyżyk],
// w przeciwnym wypadku startSign = 1 i zaczyna O [kółko].
// P.S PONIŻSZYM DWÓCH LINIJEK NIE WRZUCAMY NIGDZIE W ŻADNĄ INNĄ FUNKCJĘ, GDYŻ LOSOWANIE STARTUJĄCEGO GRACZA
// MA ODBYĆ SIĘ TYLKO RAZ, A NASTĘPNIE GRACZE SIĘ ZMIENIAJĄ SIŁĄ ZASAD GRY
var startSign = Math.floor ( ( Math.random() * 100 ) + 1 ); 
startSign % 2 == 0 ? startSign = 0 : startSign = 1; // <-- IF_INLINE

// Zmienna sprawdzająca czy ktoś wygrał, początkowa wartość jak można się domyślić będzie false;
var winStatus = false;

// Zmienna będąca pewnego rodzaju licznikiem, który inkrementuje się co ruch graczy [nie ważne czy X czy O], ale po co ?
// Po to by po 9 kliknięciach w pola planszy "odwgizdać" REMIS
var clicker = 0;

function RandomPlayer() {
	// Komunikat dla gracza o tym, który z nich zaczyna
	$('movement').innerHTML = startSign == 0 ? '<span style="border-bottom: 1px dotted yellow">Wylosowano gracza:</span> <br /> <br /> [~] Grę rozpocznie gracz X!' : '<span style="border-bottom: 1px dotted yellow">Wylosowano gracza:</span> <br /> <br /> [~] Grę rozpocznie gracz O!';
}

// Wywołujemy funkcje losowanie gracza - onload, gdyż od niego powinniśmy zacząć całą grę, a resztą funkcji pokieruje już
// zasada programowania strukturalnego
window.onload = RandomPlayer;

// Tworzenie tablicy pod rozgrywkę 9 element, ale liczymy od 0 do 8.
var winArray = new Array(9);
						 
// Funkcja sprawdza pola w celu weryfikacji wygranej
function checkWin(signAtNow) {
	/* ########				 Pozioma					######## */
	if (winArray[0] == signAtNow && winArray[1] == signAtNow && winArray[2] == signAtNow)
		winStatus = true;
	else if (winArray[3] == signAtNow && winArray[4] == signAtNow && winArray[5] == signAtNow)
		winStatus = true;	
	else if (winArray[6] == signAtNow && winArray[7] == signAtNow && winArray[8] == signAtNow)
		winStatus = true;
	
	/* ########				 Pionowa					######## */
	else if (winArray[0] == signAtNow && winArray[3] == signAtNow && winArray[6] == signAtNow)
		winStatus = true;
	else if (winArray[1] == signAtNow && winArray[4] == signAtNow && winArray[7] == signAtNow)
		winStatus = true;
	else if (winArray[2] == signAtNow && winArray[5] == signAtNow && winArray[8] == signAtNow)
		winStatus = true;
	
	/* ########				 Na krzyż					######## */
	else if (winArray[0] == signAtNow && winArray[4] == signAtNow && winArray[8] == signAtNow)
		winStatus = true;
	else if (winArray[2] == signAtNow && winArray[4] == signAtNow && winArray[6] == signAtNow)
		winStatus = true;
	else
		winStatus = false;
	
	// Trigger do funkcji, która może zakończyć rozgrywkę, jednak tylko pod warunkiem, że status gry będzie już jako TRUE
	// w przeciwnym wypadku po prostu JS zinterpretuje to, ale nie znajdzie przypadku do wykonania jej - czyli gramy dalej! 
	endOfGame(winStatus, signAtNow);
}

function endOfGame(status, sign) {
	
	// Jeżeli status == true to wiadomo, że już wygraliśmy i z tej też racji pozwalamy sobie na małe zwieńczenie
	// naszego zwycięstwa w postaci poniższego prostego out'a dla gracza wygranego ;)
	if(status) {
		$('gamePlace').innerHTML = "<div id='end'>No... gratuluję! Wygrał " + (sign == 0 ? "X!<br />" : "O!<br />") + "<span style='color: #00ff00'>To co zagramy jeszcze raz?</span> <br /> <br /> <button id='endButton' onclick='location.reload()'>Pewnie, że zagramy! :]</button></div>";
		$('movement').innerHTML = "Brawo " + (sign == 0 ? "X!" : "O!");
	}
	
	// Jeżeli status == false to wiadomo, że rozgrywka miałaby iść dalej, ale ten else spełnia jeszcze inną funkcję, mianowicie
	// sprawdza czy przypadkiem nie jest to remis, bo jeżeli zostały już kliknięte/ odsłonięte wszystkie 9 [liczymy od 0! stąd w elsie clicker >= 8 (>= dlatego, że czasami javascript potrafi odczytać klik nie tak jak powinien, a to takie zabezpieczenie na tzw. unexpected behaviors]) kafelek na planszy
	// to dalej nie ma co już grać, więc jest to REMIS
	else if( (!status) && clicker >= 8 ) {
		$('gamePlace').innerHTML = "<div id='end'>Uuuu... niestety <span style='color: #0000ff'>mamy remis</span>, ale zagrajmy raz jeszcze, a nóż to Ty wygrasz ;) <br /> <br /> <button id='endButton' onclick='location.reload();'>Zagrajmy ponownie, proszę :)</button></div>";
		$('movement').innerHTML = "Ahh ten... remis!";
	}
}			 

// Funkcja wymienia obrazek po ID
function swapper(elementID) {
	
	$('movement').innerHTML = startSign == 0 ? 'Ruch O!' : 'Ruch X!';
	
	if (startSign == 0) {
		winArray[ (elementID.substr(1,2) - 1) ] = startSign;
		checkWin(startSign);
		clicker += 1;
		$(elementID).src = 'graphics/x.png';
		$(elementID).onclick = ";";
		$(elementID).style.cursor = "context-menu";
		startSign = 1;
		
	} else if (startSign == 1) {
		winArray[ (elementID.substr(1,2) - 1) ] = startSign;
		checkWin(startSign);
		clicker += 1;
		$(elementID).src = 'graphics/o.png';
		$(elementID).onclick = ";";
		$(elementID).style.cursor = "context-menu";
		startSign = 0;
	}
}
