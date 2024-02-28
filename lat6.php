<?php
// Define language variables
$spanishLevel = "My language";
$englishLevel = "Nak telvad";

// Define an array of technical skills
$technicalSkills = [
    "Process Validation",
    "Quality Regulations and Standards",
    "Risk Analysis",
    "Problem Solving",
    
];
$name;
if(isset($_POST['register_btn'])){
    $name = $_POST['name'];
}

// Define the limit value for the for loop
$limit = count($technicalSkills);

// Initialize an empty string to store the LaTeX code for technical skills
$technicalSkillsLaTeX = '\begin{center}
    \begin{itemize}[label=\faIcon{check}, itemsep=-3pt]';

// Loop through the technical skills array and add each skill to the LaTeX code
for ($i = 0; $i < $limit; $i++) {
    $technicalSkillsLaTeX .= '\item ' . $technicalSkills[$i];
}

// Add closing tags for the LaTeX code for technical skills
$technicalSkillsLaTeX .= '
    \end{itemize}
\end{center}';

// LaTeX code to compile with PHP variables
$latexCode = '
\documentclass[a4paper,10pt]{article}
\usepackage[left=1in, right=1in, top=1in, bottom=1in]{geometry}
\usepackage{enumitem}
\usepackage{titlesec}
\usepackage{parskip}
\usepackage{xcolor}
\usepackage{fontawesome5}
\usepackage[hidelinks]{hyperref}

% Define el color verde olivo
\definecolor{verdeolivo}{RGB}{85,107,47} % Puedes ajustar estos valores según tus preferencias

\titleformat{\section}{\large\bfseries\color{verdeolivo}}{}{0em}{}[\titlerule]
\titleformat{\subsection}[runin]{\bfseries\color{verdeolivo}}{}{0em}{}[:]

\begin{document}

\pagestyle{empty}

%\section*{\faIcon{address-card} Contact Information}
\begin{center}
    \textbf{\Huge ' . $name . '} \\
    \vspace{2mm}
    \faIcon{briefcase} Quality Engineer
\end{center}

\vspace{4mm}
\begin{center}
    \faIcon{phone} \href{https://wa.me/1234567890}{(123) 456-7890} \hspace{2cm}
    \faIcon{envelope} \href{mailto:john.doe@example.com}{john.doe@example.com} \hspace{2cm}
    \faIcon{linkedin} \href{https://www.linkedin.com/in/johndoe/}{johndoe}
\end{center}


\space
\section*{\faIcon{user} Professional Profile}
I am a Chemical Engineer with a passion for problem solving and quality. With my experience with leading medical device manufacturing companies, I have developed skills and knowledge about the regulations of this highly regulated industry with high quality standards. 

\section*{\faIcon{building} Work Experience}

\subsection*{ABCD Medical \hfill Apr 2022 - Actual}
\textit{ Quality Engineer} \\
Implementing regulations, GMP, Lean methodologies, and 6S.
Conducting risk management and analysis through FMEAs.
Developing and executing protocols, procedures, and validation reports (TMVs).
Actively contributing to the creation of a Validation Master Plan for various new production lines.
Defining Critical to Quality (CTQs), establishing quality controls, and developing validation strategies for IQs, OQs, PQs, PPQs as required.
Drafting Component Specifications (CSs) and overseeing raw material inspection processes (FAIs).
Collaborating closely with customers and working alongside operators, technicians, buyers, and sterilization teams to ensure quality and timely deliveries.

\subsection*{Agroindustrial RIMAC \hfill Jan 2022 - Apr 2022}
\textit{ Regulatory Assistant} \\
To provide regulatory documentation support for various Active Ingredients

\section*{\faIcon{graduation-cap} Education}

\subsection*{Universidad de Costa Rica \hfill In progress}
\textit{Lic. Chemical Engineer}\\
Thesis topic "Implementation of the Failure Modes and Effects Analysis (FMEA) methodology for risk detection in the electro-surgical pencil device with smoke evacuation to enhance product quality."

\section*{\faIcon{cogs} Technical Skills}
' . $technicalSkillsLaTeX . '

\section*{\faIcon{certificate} Certifications}
\begin{itemize}[label=\faIcon{certificate}]
    \item Prints Reading
    \item Applied Statistics in Medical Devices Manufacturing
    \item Design of Experiments (DOE)
    \item Root Cause Anlysis
\end{itemize}

%\section*{\faIcon{code} Notable Projects}
%\subsection*{Project 1 \hfill Start Date - End Date}
%Description of the project and your contributions.

%\subsection*{Project 2 \hfill Start Date - End Date}
%Description of the project and your contributions.

\section*{\faIcon{language} Languages}
\begin{itemize}[label=\faIcon{globe}]
    \item  - ' . $spanishLevel . '
    \item - ' . $englishLevel . '
\end{itemize}

\section*{\faIcon{thumbs-up} References}
For reference contact Jane Smith\\ \textbf{\faIcon{linkedin} LinkedIn:} \href{https://www.linkedin.com/in/jane-smith/}{jane-smith}

\end{document}
';

// Write LaTeX code to a .tex file
$file = 'C:\xampp\htdocs\Signup\Day_4\document.tex';
file_put_contents($file, $latexCode);

// Execute pdflatex to compile LaTeX code into PDF
$output = shell_exec("\"C:\\Program Files\\MiKTeX\\miktex\\bin\\x64\\pdflatex.exe\" $file 2>&1");

// Output PDF file
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename=document.pdf');
readfile('document.pdf');

// Clean up temporary files
unlink($file);
unlink('document.log');
unlink('document.aux');
unlink('document.pdf');
?>
