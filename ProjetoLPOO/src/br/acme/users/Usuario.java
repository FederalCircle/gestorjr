package br.acme.users;

public class Usuario {
	//Atributos-----------------------------------------------------------------------------------------------------
	private long id;
	private static long idIncrement=0;
	private String cpf;
	private String nome;
	private String senha;
	private String email;
	private String sexo;
	
	// Construtor------------------------------------------------------------------------------------------------------
	public Usuario(String cpf, String nome, String senha, String email, String sexo){
		idIncrement++; //Elemento estático que varia de acordo com a quantidade de objetos
		this.id = idIncrement; //Identifica o objeto a partir de um ID único
		this.cpf= cpf;
		this.nome = nome;
		this.senha =senha;
		this.email = email;
		this.sexo = sexo;		
	}
  
	// Getters e Setters-----------------------------------------------------------------------------------------------
	public long getId() {
		return id;
	}

	public String getCpf(){
		return cpf;
	}
	
	public void setCpf(String cpf){
		this.cpf=cpf;
	}
	
	public String getNome(){
		return nome;
	}
	
	public void setNome(String nome){
		this.nome=nome;
	}
	public String getSenha(){
		return senha;
	}
	
	public void setSenha(String senha){
		this.senha = senha;
	}
	
	public String getEmail(){
		return email;
	}
	
	public void setEmail(String email){
		this.email=email;
	}
	
	public String getSexo(){
		return sexo;
	}
	public void setSexo(String sexo){
		this.sexo = sexo;
	}
	 public long getidIncrement(){
		 return idIncrement;
	 }
	
	// Métodos-------------------------------------------------------------------------------------------
	public String toString(){
		
		return "ID: "+this.id+";Nome: "+this.nome+";CPF: "+this.cpf+";Senha: "+this.senha+";Email: "+this.email+";Sexo: "+this.sexo+";";
	}
}
