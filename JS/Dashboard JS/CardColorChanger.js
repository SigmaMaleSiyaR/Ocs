console.log("script 'CardColorChanger.js' executed");
    document.addEventListener("DOMContentLoaded", function () {
      // Access PHP variables through the phpVars object
      var HOD_status = phpVars.HOD_status;
      var fine_status = phpVars.fine_status;
      var CC_status = phpVars.CC_status;
      var Library_HOD_status = phpVars.Library_HOD_status;
      var Sports_status = phpVars.Sports_status;
      var TNP_status = phpVars.TNP_status;
      var Scholarship_status = phpVars.Scholarship_status;
      var Accountant_status = phpVars.Accountant_status;
      var Review_HOD = phpVars.Review_HOD;
      var Review_fine = phpVars.Review_fine;
      var Review_CC = phpVars.Review_CC;
      var Review_Library = phpVars.Review_Library;
      var Review_Sports = phpVars.Review_Sports;
      var Review_TNP = phpVars.Review_TNP;
      var Review_Scholarship = phpVars.Review_Scholarship;
      var Review_Accountant = phpVars.Review_Accountant;
            changeCardColor(
              "Mycard1",
              "cardImage1",
              getColorBasedOnStatus(HOD_status, Review_HOD)
            );
            changeCardColor(
              "Mycard2",
              "cardImage2",
              getColorBasedOnStatus(fine_status, Review_fine)
            );
            changeCardColor(
              "Mycard3",
              "cardImage3",
              getColorBasedOnStatus(CC_status, Review_CC)
            );
            changeCardColor(
              "Mycard4",
              "cardImage4",
              getColorBasedOnStatus(Library_HOD_status, Review_Library)
            );
            changeCardColor(
              "Mycard5",
              "cardImage5",
              getColorBasedOnStatus(Sports_status, Review_Sports)
            );
            changeCardColor(
              "Mycard6",
              "cardImage6",
              getColorBasedOnStatus(TNP_status, Review_TNP)
            );
            changeCardColor(
              "Mycard7",
              "cardImage7",
              getColorBasedOnStatus(Scholarship_status, Review_Scholarship)
            );
            changeCardColor(
              "Mycard8",
              "cardImage8",
              getColorBasedOnStatus(Accountant_status, Review_Accountant)
            );
          });

          function getColorBasedOnStatus(status, reviewStatus) {
            if (reviewStatus === "1") {
              if (status === "1") {
                return "#d4edda"; // Change to the color you want for Approved
              } else if (status === "0") {
                return "#f8d7da"; // Change to the color you want for Rejected
              }
            }
          }

          function changeCardColor(cardId, cardImageId, color) {
            var card = document.getElementById(cardId);

            if (card) {
              card.style.backgroundColor = color;
            }

            var cardImage = document.getElementById(cardImageId);

            if (cardImage) {
              if (color === "#d4edda") {
                cardImage.src = "../images/approved.png";
              } else if (color === "#f8d7da") {
                cardImage.src = "../images/rejected.png";
              }
            }
          }
        