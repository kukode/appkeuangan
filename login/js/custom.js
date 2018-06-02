            function kalkulasiNetto()
            {
                interval = setInterval("kalkulasi()",1);
            }
        
            function kalkulasi()
            {
                var txt1 = document.getElementById("anggaran").value;
                var txt2 = document.getElementById("realisasi").value;
                
                document.getElementById("sisa_anggaran").value = (txt1 * 1) - (txt2 * 1);
                document.getElementById("persen").value = ( ((txt2 * 1) / 100 ) / ( (txt1 * 1) / 100 ));
            }
        
            function stopKalkulasi()
            {
                clearInterval(interval);    
            }