$(document).ready( function () {
    $('#protein_table').DataTable();
} );


// 3dmol -------------------- EXTRAIDO DE BETAGDB

/* one.js */

var glviewer = null;
var labels = [];

/* Load default PDB */
// document.onload = main("Acidilobus_saccharovorans");

/* Load table */

/* Main function */
function main(id){

	/* Title */
	infoTitle(id);

	/* Family */
	infoFamily(id);

	/* Info Model */
	infoModel(id);

	/* Load PDB and summary */
	readPDB(id);
	// readSummary(id);

}



/* Load summary */
function readSummary(id){
	var txt = frontend+"data/reports/"+id+".htm";

	/*
	$.post(txt, function(d) {
		$("#summary_info").text(txt+"\n\n"+d);
	});
	*/
	var obj = document.getElementById('summary_report');
	obj.src = txt;	

}

const colorSS = function(viewer) {

	//color by secondary structure
	const m = viewer.getModel();
	viewer.setStyle({},{cartoon:{}}); /* Cartoon */

	m.setColorByFunction({}, function(atom) {
		if(atom.ss == 'h') return "magenta";
		else if(atom.ss == 's') return "orange";
		else return "white";
	});
	viewer.render();
}

/* spectrum */
function colorSpectrum(glviewer){
	glviewer.setStyle({},{cartoon:{color:'spectrum'}}); 
	glviewer.render();
}

/* atom */
function colorGray(glviewer){
	glviewer.setStyle({},{cartoon:{colorscheme:'whiteCarbon'}}); 
	glviewer.render();
}

var atomcallback = function(atom, viewer) {
	if (atom.clickLabel === undefined
			|| !atom.clickLabel instanceof $3Dmol.Label) {
		atom.clickLabel = viewer.addLabel(atom.resn + " " + atom.resi + " ("+ atom.elem + ")", {
			fontSize : 10,
			position : {
				x : atom.x,
				y : atom.y,
				z : atom.z
			},
			backgroundColor: "black"
		});
		atom.clicked = true;
	}

	//toggle label style
	else {
		if (atom.clicked) {
			var newstyle = atom.clickLabel.getStyle();
			newstyle.backgroundColor = 0x66ccff;

			viewer.setLabelStyle(atom.clickLabel, newstyle);
			atom.clicked = !atom.clicked;
		}
		else {
			viewer.removeLabel(atom.clickLabel);
			delete atom.clickLabel;
			atom.clicked = false;
		}
	}
};

/* Reading PDB */
function readPDB(id){
	let id_aux = id.substr(0,id.length-1);
	let txt = frontend+"/data/"+id_aux+".pdb";

	$.post(txt, function(d) {
		moldata = data = d;

		/* Creating visualization */
		glviewer = $3Dmol.createViewer("pdb", {
			defaultcolors : $3Dmol.rasmolElementColors
		});

		/* Color background */
		glviewer.setBackgroundColor('white');

		receptorModel = m = glviewer.addModel(data, "pqr");

		/* Type of visualization */
		glviewer.setStyle({},{cartoon:{color:'spectrum'}}); /* Cartoon multi-color */
		/*glviewer.addSurface($3Dmol.SurfaceType, {opacity:0.3});  Surface */

		/* Name of the atoms */
		atoms = m.selectedAtoms({});
		for ( var i in atoms) {
			var atom = atoms[i];
			atom.clickable = true;
			atom.callback = atomcallback;
		}

		glviewer.mapAtomProperties($3Dmol.applyPartialCharges);
		glviewer.zoomTo();
		glviewer.render();
	})
    .fail(function() {
        document.querySelector("#pdb").innerHTML = `<p>This model is not available now. You can check this example: <a href="${frontend}/protein/WP_010881472">WP_010881472</a>.</p>`;
    })
}

/* Select all glu */
function selectGLU(glviewer){
	glviewer.setStyle({resn:'GLU'},{stick:{colorscheme:'whiteCarbon'}}); 
	glviewer.render();
}

/* Select ID */
function selectID(glviewer){
	var resID = $('#sID').val();
	glviewer.setStyle({resi:resID},{stick:{colorscheme:'whiteCarbon'}}); 
	glviewer.render();
}

/* Select ID */
function selectResn(glviewer){
	var resname = $('#sresn').val();
	resname = resname.toUpperCase();
	glviewer.setStyle({resn:resname},{stick:{colorscheme:'whiteCarbon'}}); 
	glviewer.render();
}

/* info about model */
function infoModel(org){

	switch(org){

		/* Models */
		case "Thermotoga_naphthophila": $("#idModel").text("MODEL TEMPLATE: 1OD0"); break; /* akram */
		case "Caldicellulosiruptor_bescii": $("#idModel").text("MODEL TEMPLATE: 3AHX"); break; /* bai */
		case "Thermoanaerobacter_brockii": $("#idModel").text("MODEL TEMPLATE: 5DT5"); break; /* breves */
		case "Metagenome_Turpan_Depression": $("#idModel").text("MODEL TEMPLATE: 1OD0"); break; /* cao */
		case "Bacillus_subtilis": $("#idModel").text("MODEL TEMPLATE: 4IPL"); break; /* chamoli */
		case "Thermotoga_petrophila": $("#idModel").text("MODEL TEMPLATE: 1OD0"); break; /* cota_tp */
		case "Hypocrea_jecorina_Trichoderma_reesei": $("#idModel").text("MODEL TEMPLATE: 3AHY"); break; /* guo */
		case "Mucor_circinelloides": $("#idModel").text("MODEL TEMPLATE: 4I8D"); break; /* huang */
		case "Fervidobacterium_islandicum": $("#idModel").text("MODEL TEMPLATE: 4HA3"); break; /* jabbour */
		case "Metagenome_soil": $("#idModel").text("MODEL TEMPLATE: 1OD0"); break; /* lu */
		case "Neurospora_crassa": $("#idModel").text("MODEL TEMPLATE: 4MDO"); break; /* meleiro */
		case "Thermoanaerobacterium_thermosaccharolyticum": $("#idModel").text("MODEL TEMPLATE: 5DT5"); break; /* pei */
		case "Talaromyces_funiculosus_Penicillium_funiculosum": $("#idModel").text("MODEL TEMPLATE: 4D0J"); break; /* ramani */
		case "Metagenome_hydrothermal_spring": $("#idModel").text("MODEL TEMPLATE: 4HA3"); break; /* schroder */
		case "Nasutitermes_takasagoensis": $("#idModel").text("MODEL TEMPLATE: 3AHZ"); break; /* uchima */
		case "Metagenome_Kusaya_gravy": $("#idModel").text("MODEL TEMPLATE: 1OD0"); break; /* uchiyama */
		case "Thermoanaerobacterium_aotearoense": $("#idModel").text("MODEL TEMPLATE: 5DT5"); break; /* yang_f */
		case "Metagenome_China_South_Sea": $("#idModel").text("MODEL TEMPLATE: 3AHX"); break; /* yang_f */

		/* PDBs */
		case "Acidilobus_saccharovorans": 
			$("#idModel").text("PDB ID: 4HA3"); 
			$("#idModel").append(" <span style=\"color:#dbb711;font-size:12px;text-align:right\" class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>");
			break; /* Gumerov */

		case "Exiguobacterium_antarcticum_B7": 
			$("#idModel").text("PDB ID: 5DT5"); 
			$("#idModel").append(" <span style=\"color:#dbb711;font-size:12px;text-align:right\" class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>");
			break; /* Crespim */

		case "Humicola_grisea_var_thermoidea": 
			$("#idModel").text("PDB ID: 4MDO"); 
			$("#idModel").append(" <span style=\"color:#dbb711;font-size:12px;text-align:right\" class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>");
			break; /* de_Giuseppe */

		case "Neotermes_koshunensis": 
			$("#idModel").text("PDB ID: 3AHZ"); 
			$("#idModel").append(" <span style=\"color:#dbb711;font-size:12px;text-align:right\" class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>");
			break; /* Uchima and de_Giuseppe */
		
		case "Pyrococcus_furiosus": 
			$("#idModel").text("PDB ID: 3APG"); 
			$("#idModel").append(" <span style=\"color:#dbb711;font-size:12px;text-align:right\" class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>");
			break; /* cota */
		
		default: $("#idModel").text("MODEL TEMPLATE"); break;

	}

}

/* info about family */
function infoFamily(org){
	if((org == "Mucor_circinelloides")||(org == "Talaromyces_funiculosus_Penicillium_funiculosum")){
		$("#family").text("GH3");
		$("#family").addClass("btn-warning");
		$("#family").removeClass("btn-success");
	}
	else{
		$("#family").text("GH1");		
		$("#family").addClass("btn-success");
		$("#family").removeClass("btn-warning");
	}
}

/* Title */
function infoTitle(id){
	var org = id.replace(/_/g," ");
	$(".name_organism").text(org);
}




// executa
main(id);