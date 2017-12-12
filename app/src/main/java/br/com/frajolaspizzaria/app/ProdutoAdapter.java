package br.com.frajolaspizzaria.app;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.squareup.picasso.Picasso;

import java.util.List;

/**
 * Created by 16254842 on 28/11/2017.
 */

public class ProdutoAdapter extends ArrayAdapter<Produto> {
    public ProdutoAdapter(Context ctx, List<Produto> itens) {
        super(ctx, 0, itens);
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {

        View v = convertView;
        if (v == null){
            v = LayoutInflater.from(getContext()).inflate(R.layout.list_main_item, null);
        }

        Produto item = getItem(position);

        ImageView imagem = (ImageView)v.findViewById(R.id.imgPizza);
        TextView txtProduto = v.findViewById(R.id.txtNome);
        TextView descricao = v.findViewById(R.id.txtDescricao);
        TextView preco = v.findViewById(R.id.txtPreco);

        txtProduto.setText(item.getNome());
        descricao.setText(item.getDescricao());
        preco.setText(item.getValor().toString());


        String link = "http://10.0.2.2/pizzaria/cms/" + item.getImagem();
        Log.d("link", link);

        Picasso.with(getContext())
                .load( link )
                .into(imagem);



        return v;
    }
}
