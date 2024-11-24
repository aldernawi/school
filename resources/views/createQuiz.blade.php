<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <title>School System</title>
  </head>
  <body dir="rtl" class="main">
    <header class="header container">
      <div class="header--links">
        <div class="links-shower"><i class="fa-solid fa-bars"></i></div>
        <div class="links-holder">
          <span><i class="fa-solid fa-xmark"></i></span>
          <a href="../index.html" class="link">الصفحة الرئيسية</a>
          <a href="students.html" class="link">الطلبة</a>
          <a href="grades.html" class="link">الدرجات</a>
          <a href="quizes.html" class="link active">الامتحانات</a>
        </div>
      </div>
      <div class="header--content">
        <a href="../profile.html" class="user"
          ><img src="../src/assets/images/user.jpg" class="logo"
        /></a>
        <a href="register.html" class="sign-out">تسجيل خروج</a>
      </div>
    </header>
    <main class="create-quiz">
      <article class="create-questions">
        <div class="article-title">
          <h1 class="title">إنشاء امتحان جديد</h1>
        </div>
        <div class="quiz-name">
          <input type="text" placeholder="اسم الامتحان" class="input-quiz" />
        </div>
        <div class="quiz-time">
          <input
            type="number"
            placeholder="زمن الامتحان (بالدقائق)"
            class="input-quiz"
          />
        </div>
        <div class="questions-holder">
          <button class="create-new-quesion">إنشاء سؤال جديد</button>
          <h3 class="title">الأسئلة</h3>
          <!-- Questions will be appended here -->
        </div>
        <button class="save-quiz">حفظ الاختبار</button>
      </article>
    </main>
    <footer class="footer container">
      <div>عدد الأسئلة <span class="questions-number">0</span></div>
      <div>عدد الدرجات <span class="grades-number">0</span></div>
    </footer>
    <div class="create-quesion">
      <h2 class="title">إنشاء سؤال جديد</h2>
      <div class="question-body">
        <input type="text" placeholder="السؤال" class="q-name field" />
        <input type="number" placeholder="الدرجة" class="q-mark field" />
        <select name="question-type" id="question-type" class="field">
          <option value="" selected disabled hidden>نوع السؤال</option>
          <option value="true-of-false">صح أو خطأ</option>
          <option value="chose-the-correct">اختر الإجابة الصحيحة</option>
          <option value="fill-in-the-blank">أكمل مكان النقط</option>
        </select>
        <div class="answers">
          <!-- Answer inputs will be appended here -->
        </div>
        <button class="create-new-answer">إنشاء إجابة جديدة</button>
      </div>
      <div class="card-footer">
        <button class="btn create-quesion-btn">تأكيد</button>
        <button class="btn cancel-create-question red">إلغاء</button>
      </div>
    </div>
    <span class="layout"></span>
    <script>
      // Create question modal functionality
      const layout = document.querySelector(".layout");
      const qholder = document.querySelector(".create-quesion");
      const qBtn = document.querySelector(".create-new-quesion");
      if (qholder && qBtn) {
        qBtn.onclick = () => {
          qholder.style.top = "50%";
          layout.style.top = "50%";
        };
        document.querySelector(".cancel-create-question").onclick = () => {
          clearQuestion();
          qholder.style.top = "-150%";
          layout.style.top = "-150%";
        };
      }

      // Handle question type changes
      const handleQuestionType = () => {
        const questionType = document.getElementById("question-type").value;
        const answersHolder = document.querySelector(
          ".create-quesion .answers"
        );
        const createNewAnswerButton =
          document.querySelector(".create-new-answer");

        // Clear existing inputs in answersHolder
        while (answersHolder.firstChild) {
          answersHolder.removeChild(answersHolder.firstChild);
        }

        // Remove existing correct answer input or select
        const existingCorrectAnswerInput = document.querySelector(
          ".correct-answer-input"
        );
        if (existingCorrectAnswerInput) {
          existingCorrectAnswerInput.parentNode.removeChild(
            existingCorrectAnswerInput
          );
        }
        const existingCorrectAnswerSelect = document.querySelector(
          ".correct-answer-select"
        );
        if (existingCorrectAnswerSelect) {
          existingCorrectAnswerSelect.parentNode.removeChild(
            existingCorrectAnswerSelect
          );
        }

        if (questionType === "true-of-false") {
          createNewAnswerButton.style.display = "none";
          // Add correct answer select box
          const correctAnswerSelect = document.createElement("select");
          correctAnswerSelect.classList.add("correct-answer-select", "field");
          correctAnswerSelect.innerHTML = `
            <option value="" selected disabled hidden>حدد الإجابة الصحيحة</option>
            <option value="True">True</option>
            <option value="False">False</option>
          `;
          answersHolder.parentNode.insertBefore(
            correctAnswerSelect,
            answersHolder.nextSibling
          );
        } else if (questionType === "chose-the-correct") {
          createNewAnswerButton.style.display = "block";
          // Initially, create two answer inputs
          for (let i = 0; i < 2; i++) {
            const input = document.createElement("input");
            input.setAttribute("type", "text");
            input.setAttribute("placeholder", `الإجابة ${i + 1}`);
            input.classList.add("field", "answer-input");
            answersHolder.appendChild(input);
          }

          // Add correct answer select box
          const correctAnswerSelect = document.createElement("select");
          correctAnswerSelect.classList.add("correct-answer-select", "field");
          correctAnswerSelect.innerHTML = `<option value="" selected disabled hidden>حدد الإجابة الصحيحة</option>`;
          answersHolder.parentNode.insertBefore(
            correctAnswerSelect,
            answersHolder.nextSibling
          );

          // Update correct answer select options
          updateCorrectAnswerOptions();

          // Add event listener to answer inputs to update the correct answer select options
          answersHolder.addEventListener("input", updateCorrectAnswerOptions);
        } else if (questionType === "fill-in-the-blank") {
          createNewAnswerButton.style.display = "none";
          // Add one input for the correct answer
          const correctAnswerInput = document.createElement("input");
          correctAnswerInput.setAttribute("type", "text");
          correctAnswerInput.setAttribute("placeholder", "الإجابة الصحيحة");
          correctAnswerInput.classList.add("field", "correct-answer-input");
          answersHolder.parentNode.insertBefore(
            correctAnswerInput,
            answersHolder.nextSibling
          );
        }
      };

      const updateCorrectAnswerOptions = () => {
        const questionType = document.getElementById("question-type").value;
        if (questionType !== "chose-the-correct") return;

        const correctAnswerSelect = document.querySelector(
          ".correct-answer-select"
        );
        if (!correctAnswerSelect) return;

        // Clear existing options
        correctAnswerSelect.innerHTML = `<option value="" selected disabled hidden>حدد الإجابة الصحيحة</option>`;

        // Get current answer inputs
        const answerInputs = document.querySelectorAll(
          ".answers .answer-input"
        );
        answerInputs.forEach((input) => {
          const value = input.value.trim();
          if (value) {
            const option = document.createElement("option");
            option.value = value;
            option.textContent = value;
            correctAnswerSelect.appendChild(option);
          }
        });
      };

      // Create question function
      const getQuestionNumber = () => {
        return (
          document.querySelectorAll(".questions-holder > .question").length || 0
        );
      };

      const createQuestion = () => {
        const qName = document
          .querySelector(".create-quesion .q-name")
          .value.trim();
        const qMark = document
          .querySelector(".question-body .q-mark")
          .value.trim();
        const qType = document.getElementById("question-type").value;

        let correctAnswer = "";

        // Get correct answer
        if (qType === "true-of-false" || qType === "chose-the-correct") {
          const correctAnswerSelect = document.querySelector(
            ".correct-answer-select"
          );
          if (correctAnswerSelect) {
            correctAnswer = correctAnswerSelect.value;
          }
        } else if (qType === "fill-in-the-blank") {
          const correctAnswerInput = document.querySelector(
            ".correct-answer-input"
          );
          if (correctAnswerInput) {
            correctAnswer = correctAnswerInput.value.trim();
          }
        }

        // Create question container
        const questionHolder = document.createElement("div");
        questionHolder.classList.add("question");

        // Store correct answer as data attribute
        questionHolder.dataset.correctAnswer = correctAnswer;

        // Create question mark
        const questionMark = document.createElement("span");
        questionMark.classList.add("grade");
        questionMark.innerHTML = `${qMark} درجات`;

        // Create question title
        const questionTitle = document.createElement("h2");
        questionTitle.classList.add("question-title");
        questionTitle.innerHTML = `س - ${qName}`;
        questionTitle.appendChild(questionMark);

        // Create question type
        const questionType = document.createElement("h3");
        questionType.classList.add("question-type");
        questionType.innerHTML = `النوع - ${qType}`;

        // Create question number
        const questionNumber = document.createElement("span");
        questionNumber.classList.add("question-number");
        questionNumber.innerHTML = getQuestionNumber() + 1;

        // Create question body
        const questionBody = document.createElement("div");
        questionBody.classList.add("answers");

        if (qType === "true-of-false" || qType === "chose-the-correct") {
          // For these types, show options
          const answers = [];
          if (qType === "true-of-false") {
            answers.push("True");
            answers.push("False");
          } else {
            const answerInputs = document.querySelectorAll(
              ".answers .answer-input"
            );
            answerInputs.forEach((input) => {
              answers.push(input.value.trim());
            });
          }

          answers.forEach((answerText, index) => {
            const answer = document.createElement("div");
            answer.classList.add("answer");

            const input = document.createElement("input");
            input.setAttribute("type", "radio");
            input.setAttribute(
              "id",
              `q${getQuestionNumber() + 1}-a${index + 1}`
            );
            input.setAttribute("name", `q${getQuestionNumber() + 1}`);

            const label = document.createElement("label");
            label.setAttribute(
              "for",
              `q${getQuestionNumber() + 1}-a${index + 1}`
            );
            label.textContent = answerText;

            answer.appendChild(input);
            answer.appendChild(label);
            questionBody.appendChild(answer);
          });
        } else if (qType === "fill-in-the-blank") {
          // For fill in the blank, show an input field
          const inputField = document.createElement("input");
          inputField.setAttribute("type", "text");
          inputField.setAttribute("placeholder", "إجابتك");
          inputField.classList.add("field");
          questionBody.appendChild(inputField);
        }

        // Append elements to question holder
        questionHolder.appendChild(questionTitle);
        questionHolder.appendChild(questionType);
        questionHolder.appendChild(questionNumber);
        questionHolder.appendChild(questionBody);

        // Add the question to the questions holder in the DOM
        document.querySelector(".questions-holder").appendChild(questionHolder);

        // Close the modal or form
        qholder.style.top = "-150%";
        layout.style.top = "-150%";

        // Reset the form
        document.querySelector(".create-quesion .q-name").value = "";
        document.querySelector(".question-body .q-mark").value = "";
        document.getElementById("question-type").value = "";
        // Clear answers
        const answersHolder = document.querySelector(
          ".create-quesion .answers"
        );
        while (answersHolder.firstChild) {
          answersHolder.removeChild(answersHolder.firstChild);
        }
        // Remove correct answer input/select
        const existingCorrectAnswerInput = document.querySelector(
          ".correct-answer-input"
        );
        if (existingCorrectAnswerInput) {
          existingCorrectAnswerInput.parentNode.removeChild(
            existingCorrectAnswerInput
          );
        }
        const existingCorrectAnswerSelect = document.querySelector(
          ".correct-answer-select"
        );
        if (existingCorrectAnswerSelect) {
          existingCorrectAnswerSelect.parentNode.removeChild(
            existingCorrectAnswerSelect
          );
        }

        // Update counts
        updateQuestionsCount();
        updateGradesCount();
      };

      // Update question and grade counts
      const updateQuestionsCount = () => {
        const questionCount = getQuestionNumber();
        const questionsNumberSpan = document.querySelector(".questions-number");
        if (questionsNumberSpan) {
          questionsNumberSpan.textContent = questionCount;
        }
      };

      const updateGradesCount = () => {
        const questions = document.querySelectorAll(
          ".questions-holder .question"
        );
        let totalGrades = 0;
        questions.forEach((question) => {
          const gradeSpan = question.querySelector(".grade");
          if (gradeSpan) {
            const gradeValue = parseInt(gradeSpan.textContent);
            totalGrades += isNaN(gradeValue) ? 0 : gradeValue;
          }
        });
        const gradesNumberSpan = document.querySelector(".grades-number");
        if (gradesNumberSpan) {
          gradesNumberSpan.textContent = totalGrades;
        }
      };

      // Clear question form
      const clearQuestion = () => {
        document.querySelector(".q-name").value = "";
        document.querySelector(".q-mark").value = "";
        document.getElementById("question-type").value = "";
        // Hide create new answer button
        document.querySelector(".create-new-answer").style.display = "none";
        // Remove answers
        const answersHolder = document.querySelector(
          ".create-quesion .answers"
        );
        while (answersHolder.firstChild) {
          answersHolder.removeChild(answersHolder.firstChild);
        }
        // Remove correct answer input/select
        const existingCorrectAnswerInput = document.querySelector(
          ".correct-answer-input"
        );
        if (existingCorrectAnswerInput) {
          existingCorrectAnswerInput.parentNode.removeChild(
            existingCorrectAnswerInput
          );
        }
        const existingCorrectAnswerSelect = document.querySelector(
          ".correct-answer-select"
        );
        if (existingCorrectAnswerSelect) {
          existingCorrectAnswerSelect.parentNode.removeChild(
            existingCorrectAnswerSelect
          );
        }
      };

      // Event listener for question type change
      const selector = document.querySelector("#question-type");
      if (selector) {
        selector.onchange = () => {
          handleQuestionType();
        };
      }

      // Handle create question button click
      const createQuesionBtn = document.querySelector(".create-quesion-btn");
      if (createQuesionBtn) {
        createQuesionBtn.onclick = () => {
          const qName = document
            .querySelector(".create-quesion .q-name")
            .value.trim();
          const qMark = document
            .querySelector(".question-body .q-mark")
            .value.trim();
          const qType = document.getElementById("question-type").value;

          let valid = true;
          if (!qName || !qMark || !qType) {
            alert("يرجى ملء جميع الحقول المطلوبة.");
            valid = false;
          }

          let correctAnswer = "";
          if (qType === "true-of-false" || qType === "chose-the-correct") {
            const correctAnswerSelect = document.querySelector(
              ".correct-answer-select"
            );
            if (!correctAnswerSelect || !correctAnswerSelect.value) {
              alert("يرجى تحديد الإجابة الصحيحة.");
              valid = false;
            } else {
              correctAnswer = correctAnswerSelect.value;
            }
          } else if (qType === "fill-in-the-blank") {
            const correctAnswerInput = document.querySelector(
              ".correct-answer-input"
            );
            if (!correctAnswerInput || !correctAnswerInput.value.trim()) {
              alert("يرجى إدخال الإجابة الصحيحة.");
              valid = false;
            } else {
              correctAnswer = correctAnswerInput.value.trim();
            }
          }

          if (valid) {
            createQuestion();
            clearQuestion();
          }
        };
      }

      // Save quiz functionality
      document.addEventListener("DOMContentLoaded", function () {
        const saveQuizButton = document.querySelector(".save-quiz");

        function validateInputs() {
          const quizName = document
            .querySelector(".quiz-name input")
            .value.trim();
          const quizTime = document
            .querySelector(".quiz-time input")
            .value.trim();
          const questions = document.querySelectorAll(
            ".questions-holder .question"
          );

          if (!quizName || !quizTime || questions.length === 0) {
            alert("يرجى ملء جميع الحقول المطلوبة وإضافة سؤال واحد على الأقل.");
            return false;
          }

          return true;
        }

        function createQuizJSON() {
          const quizName = document
            .querySelector(".quiz-name input")
            .value.trim();
          const quizTime = parseInt(
            document.querySelector(".quiz-time input").value.trim()
          );
          const questions = document.querySelectorAll(
            ".questions-holder .question"
          );

          const quizJSON = {
            "quiz-name": quizName,
            "quiz-time": quizTime,
            questions: [],
          };

          questions.forEach((question) => {
            const questionText = question
              .querySelector(".question-title")
              .textContent.split(" - ")[1]
              .trim();
            const questionType = question
              .querySelector(".question-type")
              .textContent.split(" - ")[1]
              .trim();
            const questionGrade = parseInt(
              question.querySelector(".grade").textContent
            ); // Get the question grade

            let answers = [];
            let correctAnswer = "";

            if (
              questionType === "true-of-false" ||
              questionType === "chose-the-correct"
            ) {
              const answerElements = question.querySelectorAll(
                ".answers .answer label"
              );
              answers = Array.from(answerElements).map((label) =>
                label.textContent.trim()
              );
              correctAnswer = question.dataset.correctAnswer || "";
            } else if (questionType === "fill-in-the-blank") {
              correctAnswer = question.dataset.correctAnswer || "";
              answers = []; // No options in fill-in-the-blank
            }

            quizJSON.questions.push({
              question: questionText,
              "question-type": questionType,
              answers: answers,
              "correct-answer": correctAnswer,
              grade: questionGrade, // Add the grade to the question object
            });
          });

          return quizJSON;
        }
        saveQuizButton.addEventListener("click", function () {
    if (validateInputs()) {
        const quizJSON = createQuizJSON();
        const jsonString = JSON.stringify(quizJSON);

        console.log("Sending JSON data:", jsonString); // طباعة البيانات المرسلة في Console
        
        fetch("/save-quiz", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
            body: JSON.stringify({ quiz_data: jsonString })
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert(data.message);
            } else if (data.error) {
                alert(data.error);
            }
        })
        .catch(error => {
            console.error("Error:", error); // طباعة أي أخطاء في Console
        });
    }
});

      });
      

    </script>
  </body>
</html>
