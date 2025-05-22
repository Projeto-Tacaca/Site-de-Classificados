      document.addEventListener('DOMContentLoaded', function() {
        const btnEditar = document.getElementById('editarPerfil');
        const btnSalvar = document.getElementById('salvarPerfil');
        const botoesFoto = document.getElementById('botoesFoto');
        const feedbackMsg = document.getElementById('feedbackMsg');
        const nomeCentralizado = document.getElementById('nomeCentralizado');
        // Atualiza o nome centralizado ao carregar e ao salvar
        function atualizarNomeCentralizado() {
          const nomeSpan = document.getElementById('inputNome');
          if (nomeSpan) nomeCentralizado.textContent = nomeSpan.textContent || '---';
        }
        atualizarNomeCentralizado();
        // Função de feedback
        function showFeedback(msg, success = true) {
          feedbackMsg.innerText = msg;
          feedbackMsg.className = 'absolute top-2 left-1/2 transform -translate-x-1/2 px-4 py-2 rounded shadow z-50 ' + (success ? 'bg-green-600 text-white' : 'bg-red-600 text-white');
          feedbackMsg.classList.remove('hidden');
          setTimeout(() => feedbackMsg.classList.add('hidden'), 2500);
        }
        // Validação simples
        function validarEmail(email) {
          return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
        function validarCPF(cpf) {
          return /^\d{3}\.\d{3}\.\d{3}-\d{2}$/.test(cpf);
        }
        function validarTelefone(tel) {
          return /^\(\d{2}\) \d{5}-\d{4}$/.test(tel);
        }
        btnEditar.addEventListener('click', function() {
          document.querySelectorAll('.editavel').forEach(function(span) {
            const valorAtual = span.innerText;
            const input = document.createElement('input');
            input.value = valorAtual;
            input.className = span.className + ' text-gray-800 focus:ring-2 focus:ring-green-800 outline-none';
            input.style.width = 'auto';
            input.style.fontFamily = 'Arial, sans-serif';
            input.style.color = '#000';
            input.style.fontSize = '12px';
            input.setAttribute('aria-label', span.previousElementSibling ? span.previousElementSibling.innerText : 'Campo');
            // Máscara para telefone
            if (span.id === 'inputTelefone') {
              input.setAttribute('maxlength', '15');
              input.addEventListener('input', function() {
                let v = input.value.replace(/\D/g, '');
                if (v.length > 0) v = '(' + v;
                if (v.length > 3) v = v.slice(0, 3) + ') ' + v.slice(3);
                if (v.length > 10) v = v.slice(0, 10) + '-' + v.slice(10, 15);
                input.value = v;
              });
            }
            // Máscara para CPF
            if (span.id === 'inputCPF') {
              input.setAttribute('maxlength', '14');
              input.addEventListener('input', function() {
                let v = input.value.replace(/\D/g, '');
                if (v.length > 3) v = v.slice(0, 3) + '.' + v.slice(3);
                if (v.length > 7) v = v.slice(0, 7) + '.' + v.slice(7);
                if (v.length > 11) v = v.slice(0, 11) + '-' + v.slice(11, 13);
                input.value = v;
              });
            }
            span.replaceWith(input);
            input.focus();
          });
          btnEditar.classList.add('hidden');
          btnSalvar.classList.remove('hidden');
          botoesFoto.classList.remove('hidden');
        });
        btnSalvar.addEventListener('click', function() {
          let valido = true;
          let msgErro = '';
          const campos = {
            inputEmail: { val: '', valid: validarEmail, msg: 'E-mail inválido!' },
            inputCPF: { val: '', valid: validarCPF, msg: 'CPF inválido!' },
            inputTelefone: { val: '', valid: validarTelefone, msg: 'Telefone inválido!' }
          };
          document.querySelectorAll('input.editavel').forEach(function(input) {
            const id = input.id || input.previousElementSibling?.getAttribute('for');
            if (id && campos[id]) {
              campos[id].val = input.value;
              if (!campos[id].valid(input.value)) {
                input.classList.add('input-error');
                valido = false;
                msgErro = campos[id].msg;
              } else {
                input.classList.remove('input-error');
                input.classList.add('input-success');
              }
            }
          });
          if (!valido) {
            showFeedback(msgErro, false);
            return;
          }
          document.querySelectorAll('input.editavel').forEach(function(input) {
            const novoSpan = document.createElement('span');
            novoSpan.className = input.className.replace(' text-gray-800 focus:ring-2 focus:ring-green-800 outline-none input-error input-success', '');
            novoSpan.innerText = input.value;
            novoSpan.classList.add('editavel');
            novoSpan.style.fontSize = '12px';
            novoSpan.id = input.id;
            input.replaceWith(novoSpan);
          });
          atualizarNomeCentralizado();
          btnSalvar.classList.add('hidden');
          btnEditar.classList.remove('hidden');
          botoesFoto.classList.add('hidden');
          showFeedback('Dados salvos com sucesso!', true);
        });
        // Foto de perfil
        const btnFoto = document.getElementById('btnFoto');
        const btnRemoverFoto = document.getElementById('btnRemoverFoto');
        const inputFoto = document.getElementById('inputFoto');
        const fotoPerfil = document.getElementById('fotoPerfil');
        btnFoto.addEventListener('click', function() {
          inputFoto.click();
        });
        inputFoto.addEventListener('change', function(e) {
          if (inputFoto.files && inputFoto.files[0]) {
            feedbackMsg.innerText = 'Carregando foto...';
            feedbackMsg.className = 'absolute top-2 left-1/2 transform -translate-x-1/2 px-4 py-2 rounded shadow z-50 bg-blue-600 text-white';
            feedbackMsg.classList.remove('hidden');
            const reader = new FileReader();
            reader.onload = function(e) {
              fotoPerfil.src = e.target.result;
              botoesFoto.classList.remove('hidden');
              setTimeout(() => feedbackMsg.classList.add('hidden'), 1000);
            };
            reader.readAsDataURL(inputFoto.files[0]);
          }
        });
        btnRemoverFoto.addEventListener('click', function() {
          fotoPerfil.src = 'https://via.placeholder.com/150';
          botoesFoto.classList.remove('hidden');
        });
      });

      function editarPerfil(){
        const btnEditar = document.getElementById('editarPerfil');
      btnEditar.click( 
        
      );

       
      }