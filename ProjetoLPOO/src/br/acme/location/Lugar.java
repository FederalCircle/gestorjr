package br.acme.location;

public class Lugar {
	// Atributos ----------------------------------------------------------------------------------------------------
	private String identificadorLugar;
	private String endereco;
	
	// Construtor ----------------------------------------------------------------------------------------------------
	public Lugar(String identificadorLugar, String endereco) {
		this.identificadorLugar = identificadorLugar;
		this.endereco = endereco;
	}
	
	// Getters and Setters ----------------------------------------------------------------------------------------------------
	public String getIdentificadorLugar() {
		return identificadorLugar;
	}
	
	public void setIdentificadorLugar(String identificadorLugar) {
		this.identificadorLugar = identificadorLugar;
	}

	public String getEndereco() {
		return endereco;
	}

	public void setEndereco(String endereco) {
		this.endereco = endereco;
	}
	//métodos---------------------------------------------------------------------------------------
	public String toString(){
		return "Identificador do Lugar: "+this.identificadorLugar+";Endereço: "+this.endereco+";";
	}
}
