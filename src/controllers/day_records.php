<?php
session_start();
//valida sessão do usuário
requireValidSession();
loadTemplateView('day_records');