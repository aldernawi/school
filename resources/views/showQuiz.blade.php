<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- fontaswesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@200..1000&display=swap"
      rel="stylesheet"
    />
    <!-- main css file -->
    <link rel="stylesheet" href="../src/style/main.min.css" />
    <title>school system</title>
  </head>
  <body dir="rtl" class="main quiz-page">
    <div id="quiz-start" class="quiz-container">
      <h1>Quiz Name: <span id="quiz-name"></span></h1>
      <h2>Time: <span id="quiz-time"></span> minutes</h2>
      <button onclick="startQuiz()" class="btn btn-primary">
        Start the Quiz
      </button>
    </div>

    <div id="quiz-container" class="quiz-container hidden">
      <div id="timer" class="timer"></div>
      <div id="questions"></div>
      <button onclick="submitQuiz()" class="btn btn-success mt-3">
        Submit Answers
      </button>
    </div>

    <div class="container quiz-result hidden">
      <div class="quiz-result--content">
        <h1>Quiz Result</h1>
        <p>Your Score: <span id="quiz-score"></span></p>
        <div id="quiz-details"></div>
        <!-- Added to display user answers and correct answers -->
      </div>
    </div>

   <<!-- <script>
      const quizData = {
        "quiz-name": "asdf",
        "quiz-time": 20,
        questions: [
          {
            question: "qf20 درجات",
            "question-type": "true-of-false",
            answers: ["True", "False"],
            "correct-answer": "True",
            grade: 20,
          },
          {
            question: "ASD10 درجات",
            "question-type": "chose-the-correct",
            answers: ["ASDF", "adf"],
            "correct-answer": "ASDF",
            grade: 10,
          },
          {
            question: "cvx10 درجات",
            "question-type": "fill-in-the-blank",
            answers: [],
            "correct-answer": "a",
            grade: 10,
          },
        ],
      };

      const startQuiz = (data) => {
      document.getElementById("quiz-name").textContent = quizData["quiz-name"];
      document.getElementById("quiz-time").textContent = quizData["quiz-time"];
      let timeLeft = quizData["quiz-time"] * 60;
      let timerInterval;

      function startQuiz() {
        document.getElementById("quiz-start").classList.add("hidden");
        document.getElementById("quiz-container").classList.remove("hidden");
        displayQuestions();
        startTimer();
      }

      function displayQuestions() {
        const questionsDiv = document.getElementById("questions");
        quizData.questions.forEach((question, index) => {
          const questionDiv = document.createElement("div");
          questionDiv.classList.add("question");

          const questionText = document.createElement("h3");
          questionText.textContent =
            question.question +
            ` - ${question.grade} درجات (${question["question-type"]})`;
          questionDiv.appendChild(questionText);

          if (question["question-type"] === "true-of-false") {
            question.answers.forEach((answer) => {
              const label = document.createElement("label");
              const input = document.createElement("input");
              input.type = "radio";
              input.name = `question-${index}`;
              input.value = answer;
              label.appendChild(input);
              label.appendChild(document.createTextNode(answer));
              questionDiv.appendChild(label);
            });
          } else if (question["question-type"] === "fill-in-the-blank") {
            const input = document.createElement("input");
            input.type = "text";
            input.name = `question-${index}`; // Ensure the name is unique for each question
            questionDiv.appendChild(input);
          } else if (question["question-type"] === "chose-the-correct") {
            question.answers.forEach((answer) => {
              const label = document.createElement("label");
              const input = document.createElement("input");
              input.type = "radio";
              input.name = `question-${index}`;
              input.value = answer;
              label.appendChild(input);
              label.appendChild(document.createTextNode(answer));
              questionDiv.appendChild(label);
            });
          }

          questionsDiv.appendChild(questionDiv);
        });
      }

      function startTimer() {
        const timerDiv = document.getElementById("timer");
        timerInterval = setInterval(() => {
          const minutes = Math.floor(timeLeft / 60);
          const seconds = timeLeft % 60;
          timerDiv.textContent = `${minutes}:${
            seconds < 10 ? "0" : ""
          }${seconds}`;
          timeLeft--;
          if (timeLeft < 0) {
            clearInterval(timerInterval);
            submitQuiz();
          }
        }, 1000);
      }

      function submitQuiz() {
        clearInterval(timerInterval);
        let score = 0;
        let totalGrades = 0; // Initialize total grades
        const quizDetailsDiv = document.getElementById("quiz-details");
        quizDetailsDiv.innerHTML = ""; // Clear previous results

        quizData.questions.forEach((question, index) => {
          const userAnswer = document.querySelector(
            `input[name="question-${index}"]:checked`
          );
          const userAnswerText = userAnswer
            ? userAnswer.value
            : document.querySelector(`input[name="question-${index}"]`).value ||
              "No answer"; // Get user's answer or indicate no answer
          const correctAnswerText = question["correct-answer"];
          const questionGrade = parseInt(question.grade); // Get the question grade

          // Check if the user's answer is correct
          if (
            userAnswerText.toLowerCase() === correctAnswerText.toLowerCase()
          ) {
            // Case insensitive comparison
            score += questionGrade; // Add the question grade to the score
          }
          totalGrades += questionGrade; // Add to total grades

          // Create a result entry for each question
          const resultEntry = document.createElement("div");
          resultEntry.innerHTML = `
            <p>Question: ${question.question} - ${questionGrade} درجات (${question["question-type"]})</p>
            <p>Your Answer: ${userAnswerText}</p>
            <p>Correct Answer: ${correctAnswerText}</p>
            <hr />
          `;
          quizDetailsDiv.appendChild(resultEntry);
        });

        document.getElementById(
          "quiz-score"
        ).textContent = `${score} / ${totalGrades}`; // Display score
        document.querySelector(".quiz-result").classList.remove("hidden"); // Show result container
        document.getElementById("quiz-container").classList.add("hidden"); // Hide quiz container
      }
    } 

    --> 

    <script>
        const startQuiz = (quizData) => {
  document.getElementById("quiz-name").textContent = quizData["quiz-name"];
  document.getElementById("quiz-time").textContent = quizData["quiz-time"];
  let timeLeft = quizData["quiz-time"] * 60;
  let timerInterval;

  function displayQuestions() {
    const questionsDiv = document.getElementById("questions");
    quizData.questions.forEach((question, index) => {
      const questionDiv = document.createElement("div");
      questionDiv.classList.add("question");

      const questionText = document.createElement("h3");
      questionText.textContent =
        question.question +
        ` - ${question.grade} درجات (${question["question-type"]})`;
      questionDiv.appendChild(questionText);

      if (question["question-type"] === "true-of-false") {
        question.answers.forEach((answer) => {
          const label = document.createElement("label");
          const input = document.createElement("input");
          input.type = "radio";
          input.name = `question-${index}`;
          input.value = answer;
          label.appendChild(input);
          label.appendChild(document.createTextNode(answer));
          questionDiv.appendChild(label);
        });
      } else if (question["question-type"] === "fill-in-the-blank") {
        const input = document.createElement("input");
        input.type = "text";
        input.name = `question-${index}`;
        questionDiv.appendChild(input);
      } else if (question["question-type"] === "chose-the-correct") {
        question.answers.forEach((answer) => {
          const label = document.createElement("label");
          const input = document.createElement("input");
          input.type = "radio";
          input.name = `question-${index}`;
          input.value = answer;
          label.appendChild(input);
          label.appendChild(document.createTextNode(answer));
          questionDiv.appendChild(label);
        });
      }

      questionsDiv.appendChild(questionDiv);
    });
  }

  displayQuestions(); // عرض الأسئلة
};

    // فك تشفير JSON وتمريره إلى JavaScript
    const quizData = @json($quiz->quiz_data);

    // استدعاء دالة startQuiz وتمرير بيانات الاختبار المفككة لها
    startQuiz(quizData);

    </script>
  </body>
</html>
