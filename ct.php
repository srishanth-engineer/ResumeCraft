<?php

if(isset($_POST['resume_next_btn'])){
    $workexp = $_POST['workexp'];
    $no_techskills = $_POST['no_techskills'];
    $no_certs = $_POST['no_certs'];
    $no_langs = $_POST['no_langs'];
    $work_sts = $_POST['work_sts'];
    //------------------------------
    $name = $_POST['name'];
    $working_role = $_POST['working_role'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $Linked_in = $_POST['Linked_in'];
    $personal_profile = $_POST['personal_profile'];
    // Roles
    $role = $_POST['role'];
    $role_start_end= $_POST['role_start_end'];
    $role_description = $_POST['role_description'];
    //---------------------------------------
    $inst_name = $_POST['inst_name'];
    $cgpa = $_POST['cgpa'];
    $grad_period = $_POST['grad_period'];
    $techSkills = $_POST['tech_skills_'];
    $cert_name= $_POST['cert_name_'];
    $lang_name = $_POST['lang_name_'];

//------------------------------------------------------------------------------------------

// Initialize an empty string to store the LaTeX code for technical skills
$role_latex = '\begin{center}
    \begin{itemize}[label=\faIcon{check}, itemsep=-3pt]';

// Loop through the technical skills array and add each skill to the LaTeX code
for ($i = 0; $i < $workexp; $i++) {
    $role_latex .= '\item ' . $role[$i];
}

// Add closing tags for the LaTeX code for technical skills
$role_latex .= '
    \end{itemize}
\end{center}';
//-------------------------------------------------------------------------------------------------

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
    \faIcon{briefcase} '.$working_role.'
\end{center}

\vspace{4mm}
\begin{center}
    \faIcon{phone} \href{https://wa.me/'.$phone_number.'}{'.$phone_number.'} \hspace{2cm}
    \faIcon{envelope} \href{mailto:'.$email.'}{'.$email.'} \hspace{2cm}
    \faIcon{linkedin} \href{'.$Linked_in.'}{'.$name.'}
\end{center}


\space
\section*{\faIcon{user} Professional Profile}
'.$personal_profile.'

\section*{\faIcon{building} Work Experience}


\subsection*{DFSA \hfill Apr 2022 - Actual}
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
' .$role_latex. '

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
$file = 'C:\xampp\htdocs\Signup\LATEX_RESUME\document.tex';
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
}
?>