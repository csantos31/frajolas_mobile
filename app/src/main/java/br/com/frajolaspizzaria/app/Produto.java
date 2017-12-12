package br.com.frajolaspizzaria.app;

/**
 * Created by 16254842 on 28/11/2017.
 */

public class Produto {

    private int id;
    private String nome;
    private String imagem;
    private String descricao;
    private Float classificacao;
    private Double valor;

    //FABRICA DE EPRODUTO
    public static Produto create(int id, String nome, String imagem, String descricao, Float classificacao, Double valor){
        Produto p = new Produto();

        p.setId(id);
        p.setNome(nome);
        p.setImagem(imagem);
        p.setDescricao(descricao);
        p.setClassificacao(classificacao);
        p.setValor(valor);

        return p;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getImagem() {
        return imagem;
    }

    public void setImagem(String imagem) {
        this.imagem = imagem;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public Float getClassificacao() {
        return classificacao;
    }

    public void setClassificacao(Float classificacao) {
        this.classificacao = classificacao;
    }

    public Double getValor() {
        return valor;
    }

    public void setValor(Double valor) {
        this.valor = valor;
    }
}
