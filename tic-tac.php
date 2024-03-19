<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TIC TAC TOE</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        .board {
            display: grid;
            grid-template-columns: repeat(3, 33.33%);
            grid-template-rows: repeat(3, 100px);
            gap: 2px;
        }

        .cell {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #000000;
            font-size: 32px;
            cursor: pointer;
        }

        .message-section {
            padding: 10px;
            font-weight: bold;
            text-align: center;
            color: #000000;
            border: 2px solid #000000;
        }

        .blue-bg {
            background-color: blue;
            color: white;
            border: 2px solid blue;
        }

        .red-bg {
            background-color: red;
            color: white;
            border: 2px solid red;
        }

        .silver-bg {
            background-color: silver;
            border: 2px solid silver;
        }
    </style>
</head>

<body>


    <div class="section-page">
        <div class="row mx-0 my-3">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card shadow border-0 mb-2 bg-warning text-center">
                    <div class="card-body">
                        <div class="message-section my-3">You are X Player</div>
                        <div class="board" id="board"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/fontawesome.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        const board = document.getElementById('board');
        const messageSection = document.querySelector('.message-section');
        const cells = [];
        let currentPlayer = 'X';
        let gameActive = true;
        const winningConditions = [
            [0, 1, 2],
            [3, 4, 5],
            [6, 7, 8],
            [0, 3, 6],
            [1, 4, 7],
            [2, 5, 8],
            [0, 4, 8],
            [2, 4, 6]
        ];

        function createBoard() {
            for (let i = 0; i < 9; i++) {
                const cell = document.createElement('div');
                cell.classList.add('cell');
                cell.dataset.index = i;
                cell.addEventListener('click', () => handleCellClick(cell));
                cells.push(cell);
                board.appendChild(cell);
            }
        }

        function handleCellClick(cell) {
            const index = cell.dataset.index;
            if (cells[index].textContent || !gameActive) return;
            cells[index].textContent = currentPlayer;
            if (checkWin(currentPlayer)) {
                announceWinner(currentPlayer);
                gameActive = false;
            } else if (checkDraw()) {
                announceDraw();
                gameActive = false;
            } else {
                currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
                if (currentPlayer === 'O') {
                    setTimeout(makeComputerMove, 500); // Wait a bit before making the computer move
                }
            }
        }

        function makeComputerMove() {
            let emptyCells = cells.filter(cell => !cell.textContent);
            let index = Math.floor(Math.random() * emptyCells.length);
            emptyCells[index].textContent = 'O';
            if (checkWin('O')) {
                announceWinner('O');
                gameActive = false;
            } else if (checkDraw()) {
                announceDraw();
                gameActive = false;
            } else {
                currentPlayer = 'X';
            }
        }

        function checkWin(player) {
            return winningConditions.some(combination => {
                return combination.every(index => cells[index].textContent === player);
            });
        }

        function checkDraw() {
            return cells.every(cell => cell.textContent);
        }

        function announceWinner(player) {
            if (player === 'X') {
                messageSection.classList.add('blue-bg');
                messageSection.textContent = 'You win!';
            } else {
                messageSection.classList.add('red-bg');
                messageSection.textContent = 'Computer wins!';
            }
            setTimeout(()=>{
                location.reload()
            }, 1500);
        }

        function announceDraw() {
            messageSection.classList.add('silver-bg');
            messageSection.textContent = 'It\'s a draw!';
            setTimeout(()=>{
                location.reload()
            }, 1500);
        }

        createBoard();
    </script>

</body>

</html>