import pandas as pd
import numpy as np
from scipy.stats import ttest_ind, f_oneway, pearsonr

def analyze_data(csv_path):
    # Membaca data dari CSV
    data = pd.read_csv(csv_path)

    # Menghitung statistik deskriptif
    descriptive_stats = data.describe()

    # Menghitung mean, median, dan mode untuk setiap kolom NP
    mean = data.mean()
    median = data.median()
    mode = data.mode().iloc[0]  # Mengambil mode pertama jika ada lebih dari satu

    # Menghitung standard deviation untuk setiap kolom NP
    std_dev = data.std()

    # Menghitung distribusi frekuensi untuk setiap kolom NP
    frequency_distribution = data.apply(lambda x: x.value_counts())

    # Menghitung Cronbach's Alpha untuk reliabilitas
    def cronbach_alpha(df):
        itemscores = df.T
        itemvars = itemscores.var(axis=1, ddof=1)
        tscores = itemscores.sum(axis=0)
        nitems = len(df.columns)
        calpha = nitems / (nitems-1) * (1 - itemvars.sum() / tscores.var(ddof=1))
        return calpha

    cronbach_alpha_value = cronbach_alpha(data[['np1', 'np2', 'np3', 'np4', 'np5', 'np6', 'np7', 'np8', 'np9', 'np10']])

    # Inferential statistics (contoh t-test dan ANOVA)
    t_stat, p_val = ttest_ind(data['np1'], data['np2'])
    anova_stat, anova_p_val = f_oneway(data['np1'], data['np2'], data['np3'])
    correlation, corr_p_val = pearsonr(data['np1'], data['np2'])

    # Hasil analisis
    results = {
        "descriptive_stats": descriptive_stats.to_dict(),
        "mean": mean.to_dict(),
        "median": median.to_dict(),
        "mode": mode.to_dict(),
        "std_dev": std_dev.to_dict(),
        "frequency_distribution": frequency_distribution.to_dict(),
        "cronbach_alpha": cronbach_alpha_value,
        "t_test": {"t_stat": t_stat, "p_val": p_val},
        "anova": {"anova_stat": anova_stat, "anova_p_val": anova_p_val},
        "correlation": {"correlation": correlation, "corr_p_val": corr_p_val}
    }

    return results

# Contoh penggunaan
if __name__ == "__main__":
    import json
    import sys

    csv_path = sys.argv[1]
    results = analyze_data(csv_path)
    print(json.dumps(results, indent=4))
