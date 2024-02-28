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
    $role_start_end = $_POST['role_start_end_'];
    $role_description = $_POST['role_description_'];
    //---------------------------------------
    $inst_name = $_POST['inst_name'];
    $cgpa = $_POST['cgpa'];
    $grad_period = $_POST['grad_period'];
    $techSkills = $_POST['tech_skills_'];
    $cert_name = $_POST['cert_name_'];
    $lang_name = $_POST['lang_name_'];

//------------------------------------------------------------------------------------------
    $work_prj_names_latex = '';
    if ($work_sts == 0) {
        $work_prj_names_latex = '\section*{\faIcon{building} Work Experience}';
    } else {
        $work_prj_names_latex = '\section*{\faIcon{building} Projects}';
    }

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
    \textbf{\Huge ' . $name . '}\\
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


'.$work_prj_names_latex.'';

    for ($i = 0; $i < $workexp; $i++) {
        $latexCode .= '
\subsection*{' . $role[$i] . ' \hfill ' . $role_start_end[$i] . '}
\textit{' . $role_description[$i] . '}\par\par';
    }

    $latexCode .= '

\section*{\faIcon{graduation-cap} Education}

\subsection*{'.$inst_name.' \hfill        CGPA '.$cgpa.' ('.$grad_period.') }

\section*{\faIcon{cogs} Technical Skills}
\begin{center}
    \begin{itemize}[label=\faIcon{check}, itemsep=-3pt]';

    for ($i = 0; $i < $no_techskills; $i++) {
        $latexCode .= '\item ' . $techSkills[$i] . "\n"; // Add a space after \item
    }

    $latexCode .= '
    \end{itemize}
\end{center}

\section*{\faIcon{certificate} Certifications}
\begin{itemize}[label=\faIcon{certificate}]';

    for ($i = 0; $i < $no_certs; $i++) {
        $latexCode .= '\item ' . $cert_name[$i] . "\n"; // Add a space after \item
    }

    $latexCode .= '
\end{itemize}

\section*{\faIcon{language} Languages}
\begin{itemize}[label=\faIcon{globe}]';

    for ($i = 0; $i < $no_langs; $i++) {
        $latexCode .= '\item ' . $lang_name[$i] . "\n"; // Add a space after \item
    }

    $latexCode .= '
\end{itemize}

\section*{\faIcon{thumbs-up} References}
For reference contact '.$name.'\\ \textbf{\faIcon{linkedin} LinkedIn:} \href{'.$Linked_in.'}{'.$name.'}

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
